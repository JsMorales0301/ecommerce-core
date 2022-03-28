<?php
require_once "C:/xampp/htdocs/ecommerce-core/controllers/Chart.controller.php";

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER['REQUEST_METHOD'];
if ($method == "OPTIONS") {
    die();
}
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_REQUEST["id"];
    $chartController = new ChartController();
    echo json_encode($chartController->getSellerProducts($id));
}