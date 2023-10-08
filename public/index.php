<?php

require('../vendor/autoload.php');

use App\Controllers\IncomesController;
use App\Controllers\WithdrawalsController;
use Router\Router;

// Obtener la URL
$slug = $_GET["slug"] ?? "";
$slug = explode("/", $slug);

$resource = $slug[0] == "" ? "/" : $slug[0];
$id = $slug[1] ?? null;

// incomes/1

// Intancia del router

$router = new Router(); 

switch($slug[0]) {
    case '/' :  echo 'home'; break;
    case 'incomes' : 
        $method = $_POST["method"] ?? "get";
        $router->set_method($method);
        $router->set_data($_POST);
        $router->route(IncomesController::class, $id);
        break;
    case 'withdrawls' : 
        $method = $_POST["method"] ?? "get";
        $router->set_method($method);
        $router->set_data($_POST);
        $router->route(WithdrawalsController::class, $id);
        break;
    default : echo '404'; break;
};