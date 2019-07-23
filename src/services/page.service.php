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

        foreach ($data as $page) {
            $sitemap->addItem('/' . $page->url, '0.6', 'weekly', $page->_modified);
        }
    }
}
