<?php

class PageController
{
    public static function getController()
    {
        return function ($request, $response, $service) {
            require_once basePath() . "/functions/page.php";

            $service->post = PostsService::$Instance->getWithUrl($request->url);
            $service->title = $service->post->title;

            $service->innerview = __DIR__ . "/../../views/page.html.php";
            $service->render(__DIR__ . "/../../views/index.html.php");
        };
    }
}
