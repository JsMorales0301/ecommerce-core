<?php

require_once "C:/xampp/htdocs/ecommerce-core/controllers/category.controller.php";
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER['REQUEST_METHOD'];
if ($method == "OPTIONS") {
    die();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $category = $_REQUEST["category"];

    $categoryController = new CategoryController(null, $category);


    $message = array("message" => "Category created successfully");
    echo json_encode($categoryController->crear());
}
//  else if ($_SERVER["REQUEST_METHOD"] == "GET"&&$_GET["id"]!=null) {
//     $categoryController = new CategoryController();

//     echo json_encode($categoryController->getById($_GET["id"]));
// } 
else if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $categoryController = new CategoryController();

    echo json_encode($categoryController->getAll());
} else if ($_SERVER["REQUEST_METHOD"] == "PUT") {
    $categoryController = new CategoryController();

    $id = $_REQUEST["id"];
    $category = $_REQUEST["category"];
    $categoryController = new CategoryController($id, $category);

    $categoryController->actualizar();
    $message = array("message" => "Category updated successfully");

    echo json_encode($message);
} else if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    $categoryController = new CategoryController();

    $id = $_REQUEST["id"];
    $categoryController = new CategoryController($id, "");

    $categoryController->eliminar();
    $message = array("message" => "Category deleted successfully");

    echo json_encode($message);
}
