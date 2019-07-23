<?php

class TagController
{
    public static function getController()
    {
        return function ($request, $response, $service) {
            if ($response->isSent()) {
                return;
            }

            require_once basePath() . "/services/tag.service.php";

            $service->posts = TagService::getWithTag($request->tag);

            if(!$service->posts) {
                return;
            }

            $service->title = "Посты с тегом #" . $request->tag;

            $service->innerview = viewsPath() . "posts.html.php";
            $service->render(viewsPath() . "index.html.php");
            $response->send();
        };
    }
}
