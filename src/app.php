<?php

class App
{
    function __construct()
    {
        $klein = new \Klein\Klein();

        $klein->respond("GET", "*", function ($request, $response, $service) {
            fill($request, $response, $service);
        });

        $klein->respond('GET', '/', function ($request, $response, $service) {
            $service->posts = PostsService::$Instance->GetPage(1);
            $service->title = "Веб разработка и игры";
            $service->innerview = __DIR__ . "/../views/posts.html.php";

            $service->render(__DIR__ . "/../views/index.html.php");
        });

        $klein->dispatch();
    }
}
