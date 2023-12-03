<?php

require_once "controller/DogController.php";
require_once "controller/PaymentMethodController.php";
require_once "controller/ServiceController.php";
require_once "controller/SolicitudController.php";
require_once "controller/StatuController.php";
require_once "controller/UserController.php";
require_once "controller/routesController.php";
require_once "controller/LoginController.php";
require_once "model/DogModel.php";
require_once "model/PaymentMethodModel.php";
require_once "model/ServiceModel.php";
require_once "model/SolicitudModel.php";
require_once "model/StatuModel.php";
require_once "model/UserModel.php";

header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
header('Access-Control-Allow-Headers: Authorization');
//$rutasArray = $_SERVER['REQUEST_URI'];

$rutasArray = explode("/", $_SERVER['REQUEST_URI']);
$endPoint = (array_filter($rutasArray)[2]); // colocar un if

    $routes = new RoutesController();
    $routes->index();    
//}
?>