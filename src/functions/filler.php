<?php

class Filler
{
    public static function getController()
    {
        return function($request, $response, $service) {
            echo $request->uri();
            $service->titlePrefix = conf("titlePrefix");
            $service->sitename = conf("sitename");
        };
    }
}
