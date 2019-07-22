<?php
require_once basePath() . "functions/cms.php";

class SidenoteService
{
    public static $Instance;
    private $collectionName = "sidenotes";
    private $Parsedown;

    public function __construct()
    {
        $this->Parsedown = new \Parsedown();
        SidenoteService::$Instance = $this;
    }

    public function getWithUrl($url)
    {
        $requestbody = [
            "filter" => [
                "url" => $url,
            ],
            "fields" => [
                "title" => 1,
                "content" => 1
            ]
        ];

        $data = CmsService::$Instance->getCollectionWithParams($this->collectionName, $requestbody);

        if (!isset($data) || count($data) == 0) {
            return null;
        }

        $note = $data[0];
        $note->content = $this->Parsedown->text($note->content);

        $noteindex = (int) $note->url;

        $previous = $this->GetTitle($noteindex - 1);
        if ($previous) {
            $previous->url = "sidenotes/" . ($nodeindex - 1);
        }
        $next = $this->GetTitle($nodeindex + 1);
        if ($next) {
            $next->url = "sidenotes/" . ($nodeindex + 1);
        }

        $note->customhomepage = [
            "link" => "/sidenotes",
            "text" => "Заметки на полях"
        ];

        return $note;
    }

    public function GetTitle($url) {
        $requestbody = [
            "filter" => [
                "url" => $url,
            ],
            "fields" => [
                "title" => 1
            ]
        ];

        $data = CmsService::$Instance->getCollectionWithParams($this->collectionName, $requestbody);

        if (!isset($data) || count($data) == 0) {
            return null;
        }

        $note = $data[0];
        return $note;
    }

    public function getPage($page)
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

        $data = CmsService::$Instance->getCollectionWithParams($this->collectionName, $requestbody);
        return $data;
    }
}

new SidenoteService();
