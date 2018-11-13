<?php
// FRONT COTROLLER
include_once('template/header.php');
// 1. Общие настройки

ini_set('display_errors', 1);
error_reporting(E_ALL);

// 2. Подключение файлов системы

define('ROOT', __DIR__); // C:\htdocs\bwt_test
require_once(ROOT.'/components/Router.php');
require_once(ROOT.'/components/Db.php');
require_once(ROOT.'/vendor/autoload.php');

// 4. Вызор Router

$router = new Router();
$router->run();