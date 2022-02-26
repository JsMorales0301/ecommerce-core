<?php

class Conexion{
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $db = 'ecommerce_app';
    private $mysqli;
    private $resultado;


    public function conectar(){
        $this->mysqli = new mysqli($this->host, $this->user, $this->pass, $this->db);
        $this->mysqli -> set_charset("utf8");
    }

    public function cerrarConexion(){
        $this -> mysqli -> close();
    }

    public function ejecutar($sentencia){
        $this -> resultado = $this -> mysqli -> query($sentencia);
    }

    public function extraer(){
        return $this -> resultado -> fetch_row();
    }

    public function numFilas(){
        return ($this -> resultado != null) ? $this -> resultado -> num_rows : 0;
    }

    public function fetch(){
        return $this -> resultado -> fetch_assoc();
    }

}

?>