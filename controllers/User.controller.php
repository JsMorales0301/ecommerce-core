<?php

require_once 'C:\xampp\htdocs\ecommerce-core\models\UserDAO.php';
require_once 'C:\xampp\htdocs\ecommerce-core\db\connection.php';

class UserController
{
    private $id;
    private $username;
    private $email;
    private $password;
    private $state;
    private $image;
    private $id_rol;
    private $conexion;
    private $userDAO;

    public function __construct($id = 0, $username = "", $email = "", $password = "", $state = 0, $image = "", $id_rol = 0)
    {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->state = $state;
        $this->image = $image;
        $this->id_rol = $id_rol;
        $this->conexion = new Conexion();
        $this->userDAO = new UserDAO($this->id, $this->username, $this->email, $this->password, $this->state, $this->image, $this->id_rol);
    }

    public function crearUsuario(){
        $this->conexion->conectar();
        $this->conexion->ejecutar($this->userDAO->crearUsuario());
        $this->conexion->ejecutar($this->userDAO->getAllDesc());
        $usuarios = array();
        if($this -> conexion ->numFilas() > 0) {
            while ($row = $this->conexion->fetch()) {
                $usuarios[] = $row;
            }
        }
        $this->conexion->cerrarConexion();
        return $usuarios;
    }
    public function autenticar()
    {
        $this->conexion->conectar();
        $this->conexion->ejecutar(($this->userDAO->autenticar()));
        if($this->conexion->numFilas()==1)
        {
            $user = $this->conexion->fetch();
            $this->conexion->cerrarConexion();
            return $user;  
        }
        else{
            return http_response_code(404);
        }
    }


}