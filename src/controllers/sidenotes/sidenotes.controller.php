<?php

class SidenotesController
{
    public function getController()
    {
        return function ($request, $response, $service) {
            require_once basePath() . "services/sidenote.service.php";

            $service->notes = SidenoteService::$Instance->getPage(1);

            $service->title = "Заметки на полях";
            $service->innerview = viewsPath() . "sidenotes.html.php";

            $service->render(viewsPath() . "index.html.php");

        };
    }
}
