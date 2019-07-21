<?php

namespace Cms;

$CockpitUrl = conf("cockpit.url");
$CockpitToken = conf("cockpit.token");

function getRequestUrl($url)
{
    global $CockpitUrl, $CockpitToken;

    return $CockpitUrl . $url . "?token=" . $CockpitToken;
}

function getCollection($collectionName)
{
    $res = request("GET", getRequestUrl("/api/collections/get/" . $collectionName));
    return $res->entries;
}

function getCollectionWithParams($collectionName, $requestBody)
{
    $res = request("POST", getRequestUrl("/api/collections/get/" . $collectionName), $requestBody);

    return $res->entries;
}
