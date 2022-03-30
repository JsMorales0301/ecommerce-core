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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_sale = $_REQUEST["id_sale"];
    $id_product = $_REQUEST["id_product"];
    $amount = $_REQUEST["amount"];

    $saleProductController = new SaleProductController($id_sale, $id_product, $amount);
    $saleProductController->create();
}
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $id_sale = $_REQUEST["id_sale"];
    $saleProductController = new SaleProductController();
    echo json_encode($saleProductController->getSaleProductById($id_sale));
}
if($_SERVER['REQUEST_METHOD'] == 'PUT'){
    $id_sale = $_REQUEST["id_sale"];
    $id_product = $_REQUEST["id_product"];
    $amount = $_REQUEST["amount"];

    $saleProductController = new SaleProductController();
    $saleProductController->updateMountProduct($id_sale, $id_product, $amount);
}
if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
    $id_product = $_REQUEST["id_product"];
    $id_sale = $_REQUEST["id_sale"];

    $saleProductController = new SaleProductController();
    $saleProductController->deleteProduct($id_product, $id_sale);
}
