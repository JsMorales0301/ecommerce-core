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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_REQUEST["id"];
    $date = $_REQUEST["date"];
    $id_client_fk = $_REQUEST["id_client_fk"];
    $state = $_REQUEST["state"];
    $total = $_REQUEST["total"];

    $saleController = new SaleController($id, $date,null, $id_client_fk, $state, $total);
    echo json_encode($saleController->crear());
}
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $saleController = new SaleController();
    echo json_encode($saleController->getSale());
}