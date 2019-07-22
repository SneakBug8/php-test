<?php
require_once basePath() . "functions/request.php";

class CmsService
{
    public static $Instance;
    private $CockpitUrl;
    private $CockpitToken;

    function __construct()
    {
        $this->CockpitUrl = conf("cockpit.url");
        $this->CockpitToken = conf("cockpit.token");

        CmsService::$Instance = $this;
    }

    function getRequestUrl($url)
    {
        return $this->CockpitUrl . $url . "?token=" . $this->CockpitToken;
    }

    function getCollection($collectionName)
    {
        $res = request("GET", $this->getRequestUrl("/api/collections/get/" . $collectionName));
        return $res->entries;
    }

    function getCollectionWithParams($collectionName, $requestBody)
    {
        $res = request("POST", $this->getRequestUrl("/api/collections/get/" . $collectionName), $requestBody);

        return $res->entries;
    }
}

new CmsService();