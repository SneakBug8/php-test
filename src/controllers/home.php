<?php

class HomeController
{
    public function getController()
    {
        return function ($request, $response, $service) {
            require_once basePath() . "/functions/posts.php";

            $service->posts = PostsService::$Instance->GetPage(1);
            $service->title = "Веб разработка и игры";
            $service->innerview = __DIR__ . "/../../views/posts.html.php";

            $service->render(__DIR__ . "/../../views/index.html.php");
        };
    }
}
