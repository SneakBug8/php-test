<?php

class SidenoteController
{
    public static function getController()
    {
        return function ($request, $response, $service) {
            require_once basePath() . "/services/sidenote.service.php";

            $note = SidenoteService::$Instance->getWithUrl($request->url);
            if(!$note) {
                return;
            }

            $service->post = $note;
            $service->title = $service->note->title;

            $service->innerview = viewsPath() . "sidenote.html.php";
            $service->render(viewsPath() . "index.html.php");
        };
    }
}
