<?php
require_once basePath() . "functions/cms.php";

class PageService
{
    public static $Instance;
    private $collectionName = "Pages";
    private $Parsedown;

    function __construct()
    {
        $this->Parsedown = new \Parsedown();
        self::$Instance = $this;
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

        if (!$data) {
            return null;
        }

        $page = $data[0];
        $page->content = $this->Parsedown->text($page->content);

        return $page;
    }
}

new PageService();
