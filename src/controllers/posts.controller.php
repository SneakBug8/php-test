<?php

class PostsController
{
    public function getController()
    {
        return function ($request, $response, $service) {
            if ($response->isSent()) {
                return;
            }

            require_once basePath() . "services/post.service.php";

            $service->posts = PostService::getPage($request->page);

            $service->title = "Публикации: страница " . $request->page;
            $service->innerview = viewsPath() . "posts.html.php";

            if ($service->posts && count($service->posts) >= 20) {
                $service->nextpage = $request->page + 1;
            }

            $service->render(viewsPath() . "index.html.php");
            $response->send();
        };
    }
}
