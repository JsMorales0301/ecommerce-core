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
    $pagina = $_GET["pagina"];
    $regPagina = $_GET["regPagina"];
    $productController = new ProductController();
    echo json_encode($productController->getProductPaginate($pagina, $regPagina));
}
