<?php

class SingleController
{
    public static function getController()
    {
        return function ($request, $response, $service) {
            require_once basePath() . "/functions/posts.php";

            $service->post = PostsService::$Instance->GetWithUrl($request->url);
            $service->title = $service->post->title;

            $service->innerview = __DIR__ . "/../../views/single.html.php";
            $service->render(__DIR__ . "/../../views/index.html.php");
        };
    }
}
