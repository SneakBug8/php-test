<?php

class Filler
{
    public static function getController()
    {
        return function($request, $response, $service) {
            $service->titlePrefix = conf("titlePrefix");
            $service->sitename = conf("sitename");
        };
    }
}
