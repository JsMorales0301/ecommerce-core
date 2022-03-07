<?php
 require_once  "C:/xampp/htdocs/ecommerce-core/controllers/user.controller.php";
 header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Allow: GET, POST, OPTIONS, PUT, DELETE");

    $method = $_SERVER['REQUEST_METHOD'];
    if($method=="OPTIONS"){
        die();
    }
    if($method == "GET"){
        $email = $_REQUEST["email"];
        $password = $_REQUEST["password"];
        $userController = new UserController(null, null, $email, $password, null, null, null);
        $response = $userController->autenticar();
        echo json_encode($response);
    }