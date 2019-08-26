<?php


set_include_path(__DIR__);

require_once basePath() . "functions/filler.php";
require_once basePath() . "controllers/home.controller.php";
require_once basePath() . "controllers/posts.controller.php";
require_once basePath() . "controllers/single.controller.php";
require_once basePath() . "controllers/page.controller.php";

require_once basePath() . "controllers/tags/tag.controller.php";

require_once basePath() . "controllers/notfound.controller.php";

class App
{
    public function __construct()
    {
        $klein = new \Klein\Klein();

        $klein->respond("GET", "/generate-sitemap", function ($request, $response) {
            require_once basePath() . "functions/sitemap.php";
            $response->redirect("/");
        });

        $klein->respond("GET", "*", Filler::getController());

        $klein->respond('GET', '/', HomeController::getController());

        $klein->respond('GET', '/p/[i:page]', PostsController::getController());
        $klein->respond('GET', '/tag/[*:tag]', TagController::getController());

        $klein->respond('GET', '/[*:url]', SingleController::getController());
        $klein->respond('GET', '/[*:url]', PageController::getController());

        $klein->respond("GET", "*", NotFoundController::getController());

        $klein->dispatch();
    }
}
