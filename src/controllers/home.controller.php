<?php

class HomeController
{
    public function getController()
    {
        return function ($request, $response, $service) {
            if ($response->isSent()) {
                return;
            }

            require_once basePath() . "services/post.service.php";
            require_once basePath() . "services/page.service.php";

            $service->posts = PostService::getPage(1);

            $page = PageService::getWithUrl("/");
            $service->page = $page;

            $service->title = $page->title;
            $service->innerviews = [
                viewsPath() . "partials/pagecontent.html.php",
                viewsPath() . "home.html.php"
            ];

            $service->hidehomelink = true;

            #$service->render(basePath(). "views/index.html.php");
            $service->render(viewsPath() . "index.html.php");
            $response->send();
        };
    }
}
