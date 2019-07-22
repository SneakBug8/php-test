<?php

class SingleController
{
    public static function getController()
    {
        return function ($request, $response, $service) {
            require_once basePath() . "/services/post.service.php";

            $post = PostService::$Instance->getWithUrl($request->url);
            if(!isset($post)) {
                return;
            }

            $service->post = $post;
            $service->title = $service->post->title;

            $service->innerview = viewsPath() . "single.html.php";
            $service->render(viewsPath() . "index.html.php");
        };
    }
}
