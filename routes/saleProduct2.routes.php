<?php

require_once "C:/xampp/htdocs/ecommerce-core/controllers/SaleProduct.controller.php";


header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

$method = $_SERVER['REQUEST_METHOD'];
if ($method == "OPTIONS") {
    die();
}

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    $id = $_REQUEST["id"];
    $date = $_REQUEST["date"];
    $state = $_REQUEST["state"];
    $total = $_REQUEST["total"];
    $saleProductController = new SaleProductController();
    $saleProductController->updateShopping($id, $date, $state, $total);
}
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id_client = $_REQUEST["id_client"];
    
    $saleProductController = new SaleProductController();
    echo json_encode($saleProductController->getSaleProductByIdSale($id_client));
}