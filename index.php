<?php
    require_once("Router.php");

    $router = new Router();

    $response = $router->handleRequest($_SERVER['REQUEST_URI'],$_SERVER['REQUEST_METHOD']);

    header("Content-Type: application/json");
    echo json_encode($response);
