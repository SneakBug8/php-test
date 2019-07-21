<?php

namespace Cms\Posts;

$collectionName = "Posts";

$Parsedown = new \Parsedown();

function getWithUrl($url)
{
    global $collectionName, $Parsedown;

    $body = [
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

    $data = \Cms\getCollectionWithParams($collectionName, $body);

    $post = $data[0];
    $post->content = $Parsedown->text($post->content);

    return $post;
}

function loadPage($page)
{
    global $collectionName;

    $body = [
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

    $data = \Cms\getCollectionWithParams($collectionName, $body);
    return $data;
}
