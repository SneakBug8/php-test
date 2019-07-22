<?php

class HomeController
{
    public function getController()
    {
        return function ($request, $response, $service) {
            require_once basePath() . "services/post.service.php";
            require_once basePath() . "services/page.service.php";

            $service->posts = PostService::$Instance->getPage(1);

            $page = PageService::$Instance->getWithUrl("/");
            $service->page = $page;

            $service->title = $page->title;
            $service->innerviews = [
                viewsPath() . "partials/pagecontent.html.php",
                viewsPath() . "home.html.php"
            ];

            #$service->render(basePath(). "views/index.html.php");
            $service->render(viewsPath() . "index.html.php");

        };
    }
}
