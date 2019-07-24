<?php
require_once basePath() . "functions/cms.php";

class SidenoteService
{
    private static $collectionName = "sidenotes";

    public function getWithUrl($url)
    {
        $requestbody = [
            "filter" => [
                "url" => $url,
            ],
            "fields" => [
                "title" => 1,
                "content" => 1,
                "url" => 1
            ]
        ];

        $data = CmsService::$Instance->getCollectionWithParams(self::$collectionName, $requestbody);

        if (!isset($data) || count($data) == 0) {
            return null;
        }

        $note = $data[0];

        $Parsedown = new \Parsedown();
        $note->content = $Parsedown->text($note->content);

        return $note;
    }

    public static function GetTitle($url)
    {
        $requestbody = [
            "filter" => [
                "url" => $url,
            ],
            "fields" => [
                "title" => 1
            ]
        ];

        $data = CmsService::$Instance->getCollectionWithParams(self::$collectionName, $requestbody);

        if (!isset($data) || count($data) == 0) {
            return null;
        }

        $note = $data[0];
        return $note;
    }

    public static function getPage($page)
    {
        $requestbody = [
            "sort" => [
                "date" => -1,
                "_created" => -1
            ],
            "fields" => [
                "title" => 1,
                "url" => 1
            ],
            "limit" => 100,
            "skip" => ($page - 1) * 100
        ];

        $data = CmsService::$Instance->getCollectionWithParams(self::$collectionName, $requestbody);
        return $data;
    }

    public static function getRenderData($note)
    {
        $noteindex = (int) $note->url;

        $previous = self::GetTitle($noteindex - 1);
        if ($previous) {
            $previous->url = "sidenotes/" . ($noteindex - 1);
        }
        $next = self::GetTitle($noteindex + 1);
        if ($next) {
            $next->url = "sidenotes/" . ($noteindex + 1);
        }

        $note->customhomepage = (object) [
                "link" => "/sidenotes",
                "text" => "Заметки на полях"
        ];

        return [
            "nav" => (object) [
                "previous" => $previous,
                "next" => $next
            ],
            "note" => $note
        ];
    }

    public static function AppendToSitemap($sitemap)
    {
        $requestbody = [
            "sort" => [
                "_modified" => -1
            ],
            "fields" => [
                "url" => 1,
                "_modified" => 1
            ],
            "filter" => [
                "hide" => false
            ],
            "limit" => 1000
        ];

        $data = CmsService::$Instance->getCollectionWithParams(self::$collectionName, $requestbody);

        if (!$data) {
            return;
        }

        foreach ($data as $note) {
            $sitemap->addItem('/' . $note->url, '0.2', 'montly', $note->_modified);
        }
    }
}
