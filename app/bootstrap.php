<?php
use app\components\Router;

session_start();

$router = new Router();
$router->run();