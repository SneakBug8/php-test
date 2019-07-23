<?php
require_once basePath() . "functions/cms.php";

class PageService
{
    private static $collectionName = "Pages";

    public static function getWithUrl($url)
    {
        $requestbody = [
            "filter" => [
                "url" => $url,
            ],
            "fields" => [
                "title" => 1,
                "content" => 1,
                "description" => 1
            ]
        ];

        $data = CmsService::$Instance->getCollectionWithParams(self::$collectionName, $requestbody);

        if (!$data) {
            return null;
        }

        $page = $data[0];

        $Parsedown = new \Parsedown();
        $page->content = $Parsedown->text($page->content);

        return $page;
    }
}
