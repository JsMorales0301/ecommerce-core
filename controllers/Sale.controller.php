<?php

require_once 'C:\xampp\htdocs\ecommerce-core\models\SaleDAO.php';
require_once 'C:\xampp\htdocs\ecommerce-core\db\connection.php';

class SaleController 
{
    private $id;
    private $date;
    private $id_seller;
    private $id_client;
    private $state;
    private $total;
    private $conexion;
    private $saleDAO;

    public function __construct($id = 0, $date = "", $id_seller = 0, $id_client = 0, $state = 0, $total = 0)
    {
        $this->id = $id;
        $this->date = $date;
        $this->id_seller = $id_seller;
        $this->id_client = $id_client;
        $this->state = $state;
        $this->total = $total;
        $this->conexion = new Conexion();
        $this->saleDAO = new SaleDAO($this->id, $this->date, $this->id_seller, $this->id_client, $this->state, $this->total);
    }


    public function crear()
    {
        $this->conexion->conectar();
        $this->conexion->ejecutar($this->saleDAO->createSale());
        $this->conexion->cerrarConexion();
        return $this->getSale();
    }

    public function getSale()
    {
        $this->conexion->conectar();
        $this->conexion->ejecutar($this->saleDAO->getSale());
        $productos = array();
        if ($this->conexion->numFilas() > 0) {
            while ($row = $this->conexion->fetch()) {
                $productos[] = $row;
            }
        }
        $this->conexion->cerrarConexion();
        return $productos[0];
    }

    public function getSaleState($idClient){
        $this->conexion->conectar();
        $this->conexion->ejecutar($this->saleDAO->getSaleState($idClient));
        $sale = array();
        if ($this->conexion->numFilas() > 0) {
            while ($row = $this->conexion->fetch()) {
                $sale[] = $row;
            }
        }
        $this->conexion->cerrarConexion();
        return $sale;
    }

    public function getAllSales()
    {
        $this->conexion->conectar();
        $this->conexion->ejecutar($this->saleDAO->getSale());
        $sales = array();
        if ($this->conexion->numFilas() > 0) {
            while ($row = $this->conexion->fetch()) {
                $sales[] = $row;
            }
        }
        $this->conexion->cerrarConexion();
        return $sales;
    }

    public function getSaleBySeller()
    {
        $this->conexion->conectar();
        $this->conexion->ejecutar($this->saleDAO->getSaleBySeller());
        $sales = array();
        if ($this->conexion->numFilas() > 0) {
            while ($row = $this->conexion->fetch()) {
                $sales[] = $row;
            }
        }
        $this->conexion->cerrarConexion();
        return $sales;
    }
}