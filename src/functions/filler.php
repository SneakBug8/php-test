<?php
    function fill($request, $response, $service) {
        $service->titlePrefix = conf("titlePrefix");
        $service->sitename = conf("sitename");
    }
?>