<?php

require_once basePath() . "functions/cms.php";

class Filler
{
    public static function getController()
    {
        return function($request, $response, $service) {
            $service->titlePrefix = conf("titlePrefix");
            $service->sitename = conf("sitename");

            $service->footer = CmsService::$Instance->getSingleton("footer")->content;
        };
    }
}