<?php
require_once basePath() . "functions/cms.php";


class TagService
{
    private static $collectionName = "Posts";
    public static function getWithTag($tag)
    {
        $requestbody = [
            "sort" => [
            "date" => -1,
            "_created" => -1
            ],
        "filter" => [
            "tags" => $tag,
            "hide" => false
        ],
        "fields" => [
            "title" => 1,
            "url" => 1
        ]
        ];

        $data = CmsService::$Instance->getCollectionWithParams(self::$collectionName, $requestbody);

        if (!isset($data) || count($data) == 0) {
            return null;
        }

        $Parsedown = new \Parsedown();

        return $data;
    }
}
