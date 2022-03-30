<?php

require_once "C:/xampp/htdocs/ecommerce-core/controllers/Sale.controller.php";
require_once "C:/xampp/htdocs/ecommerce-core/controllers/SaleProduct.controller.php";


header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

$method = $_SERVER['REQUEST_METHOD'];
if ($method == "OPTIONS") {
    die();
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $idClient = $_REQUEST["idClient"];
    $saleController = new SaleController();
    echo json_encode($saleController->getSaleState($idClient));
}