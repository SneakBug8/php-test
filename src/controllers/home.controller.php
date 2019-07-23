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

            $service->hidehomelink = true;

            if ($service->posts && count($service->posts) >= 20) {
                $service->nextpage = "2";
            }

            $service->innerviews = [
                viewsPath() . "partials/pagecontent.html.php",
                viewsPath() . "home.html.php"
            ];

            $service->render(viewsPath() . "index.html.php");
            $response->send();
        };
    }
}
