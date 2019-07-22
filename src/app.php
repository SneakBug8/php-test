<?php


set_include_path(__DIR__);

require_once basePath(). "functions/filler.php";
require_once basePath(). "controllers/home.controller.php";
require_once basePath() ."controllers/single.controller.php";
require_once basePath() ."controllers/page.controller.php";

class App
{
    function __construct() {
        $klein = new \Klein\Klein();

        $klein->respond("GET", "*", Filler::getController());
        $klein->respond('GET', '/', HomeController::getController());
        $klein->respond('GET', '/[*:url]', SingleController::getController());
        $klein->respond('GET', '/[*:url]', PageController::getController());


        $klein->dispatch();
    }
}