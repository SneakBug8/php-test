<?php

class PageController
{
    public static function getController()
    {
        return function ($request, $response, $service) {
            require_once basePath() . "/services/page.service.php";

            $service->page = PageService::$Instance->getWithUrl($request->url);

            if(!$service->page) {
                return;
            }

            $service->title = $service->page->title;

            $service->innerview = viewsPath() . "page.html.php";
            $service->render(viewsPath() . "index.html.php");
        };
    }
}
