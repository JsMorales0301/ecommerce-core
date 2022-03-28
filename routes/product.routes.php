<?php

require_once "C:/xampp/htdocs/ecommerce-core/controllers/Product.controller.php";

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER['REQUEST_METHOD'];
if ($method == "OPTIONS") {
    die();
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $productController = new ProductController();
    echo json_encode($productController->getProducts());
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_REQUEST["name"];
    $description = $_REQUEST["description"];
    $price = $_REQUEST["price"];
    $image = $_REQUEST["image"];
    $stock = $_REQUEST["stock"];
    $id_category = $_REQUEST["id_category"];
    $id_user = $_REQUEST["id_user"];
    $productController = new ProductController(null, $name, $description, $price, $image, $stock, $id_category,null,$id_user);

    $message = array("message" => "Product created successfully");
    echo json_encode($productController->crear());
}
