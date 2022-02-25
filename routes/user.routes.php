<?php

require_once "C:/xampp/htdocs/ecommerce-core/controllers/user.controller.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_REQUEST["username"];
    $email = $_REQUEST["email"];
    $password = $_REQUEST["password"];
    $state = $_REQUEST["state"];
    $image = $_REQUEST["image"];
    $id_rol = $_REQUEST["id_rol"];

    $userController = new UserController(null, $username, $email, $password, $state, $image, $id_rol);

    $userController->crearUsuario();


    $message = array("message" => "User created successfully");
    echo json_encode($message);
}
