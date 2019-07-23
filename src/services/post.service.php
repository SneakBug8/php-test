<?php
require_once basePath() . "functions/cms.php";

class PostService
{
    private static $collectionName = "Posts";

    public static function getWithUrl($url)
    {
        $requestbody = [
            "filter" => [
                "url" => $url,
            ],
            "fields" => [
                "title" => 1,
                "date" => 1,
                "content" => 1,
                "description" => 1,
                "image" => 1,
                "nextlink" => 1,
                "prevlink" => 1,
                "customhomepage" => 1,
                "tags" => 1
            ]
        ];

        $data = CmsService::$Instance->getCollectionWithParams(self::$collectionName, $requestbody);

        if(!isset($data) || count($data) == 0) {
            return null;
        }

        $post = $data[0];

        $Parsedown = new \Parsedown();
        $post->content = $Parsedown->text($post->content);

        return $post;
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
                "date" => 1,
                "url" => 1
            ],
            "filter" => [
                "hide" => false
            ],
            "limit" => 20,
            "skip" => ($page - 1) * 20
        ];

        $data = CmsService::$Instance->getCollectionWithParams(self::$collectionName, $requestbody);
        return $data;
    }
}