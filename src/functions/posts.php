<?php
class PostsService
{
    public static $Instance;
    private $collectionName = "Posts";
    private $Parsedown;

    function __construct()
    {
        $this->Parsedown = new \Parsedown();
        PostsService::$Instance = $this;
    }

    function GetWithUrl($url)
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

        $data = CmsService::$Instance->getCollectionWithParams($this->collectionName, $requestbody);

        $post = $data[0];
        $post->content = $this->Parsedown->text($post->content);

        return $post;
    }

    function GetPage($page)
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

        $data = CmsService::$Instance->getCollectionWithParams($this->collectionName, $requestbody);
        return $data;
    }
}

new PostsService();
