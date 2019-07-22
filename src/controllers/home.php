<?php

class HomeController
{
    public function getController()
    {
        return function ($request, $response, $service) {
            require_once basePath() . "functions/posts.php";
            require_once basePath() . "functions/page.php";


            $page = PagesService::$Instance->getWithUrl("/");
            $service->page = $page;

            $service->posts = PostsService::$Instance->getPage(1);
            $service->title = "Веб разработка и игры";
            $service->innerviews = [
                __DIR__ . "/../../views/page.html.php",
                __DIR__ . "/../../views/home.html.php"
            ];

            $service->render(__DIR__ . "/../../views/index.html.php");
        };
    }
}
