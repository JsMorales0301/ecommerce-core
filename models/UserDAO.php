<?php

class UserDAO
{
    private $id;
    private $username;
    private $email;
    private $password;
    private $state;
    private $image;
    private $id_rol;

    public function __construct($id, $username, $email, $password, $state, $image, $id_rol)
    {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->state = $state;
        $this->image = $image;
        $this->id_rol = $id_rol;
    }

    public function crearUsuario(){
        return "INSERT INTO user (id, username, email, password, state, image, id_rol_fk) VALUES (null,'$this->username', '$this->email', '$this->password', '$this->state', '$this->image', '$this->id_rol')";
    }
    public function autenticar(){
        return "SELECT *FROM user WHERE email='" .$this->email."' AND password='".$this->password."'";
    }
    public function getAllDesc(){
        return "SELECT *FROM user ORDER BY id DESC";
    }
}