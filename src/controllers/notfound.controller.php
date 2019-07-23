<?php

class NotFoundController
{
    public static function getController()
    {
        return function ($request, $response, $service) {
            if ($response->isSent()) {
                return;
            }

            $service->innerview = viewsPath() . "404.html";
            $service->render(viewsPath() . "index.html.php");
            $response->send();
        };
    }
}
