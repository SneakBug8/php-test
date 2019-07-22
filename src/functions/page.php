<?php
set_include_path(__DIR__);
require_once "cms.php";

class PagesService
{
    public static $Instance;
    private $collectionName = "Pages";
    private $Parsedown;

    function __construct()
    {
        $this->Parsedown = new \Parsedown();
        PostsService::$Instance = $this;
    }

    public function getWithUrl($url)
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

        $data = CmsService::$Instance->getCollectionWithParams($this->collectionName, $requestbody);

        $page = $data[0];
        $page->content = $this->Parsedown->text($page->content);

        return $page;
    }
}

new PagesService();
