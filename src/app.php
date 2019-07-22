<?php

set_include_path(__DIR__);
require_once "functions/filler.php";
require_once "controllers/home.php";
require_once "controllers/single.php";


class App
{
    function __construct()
    {
        $klein = new \Klein\Klein();

        $klein->respond("GET", "*", Filler::getController());
        $klein->respond('GET', '/', HomeController::getController());
        $klein->respond('GET', '/[*:url]', SingleController::getController());

        $klein->dispatch();
    }
}