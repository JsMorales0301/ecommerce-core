<?php

require_once 'C:\xampp\htdocs\ecommerce-core\models\SaleProductDAO.php';
require_once 'C:\xampp\htdocs\ecommerce-core\db\connection.php';

class SaleProductController
{
    private $id_sale;
    private $id_product;
    private $amount;
    private $conexion;
    private $saleProductDAO;

    public function __construct($id_sale = 0, $id_product = 0, $amount = 0)
    {
        $this->id_sale = $id_sale;
        $this->id_product = $id_product;
        $this->amount = $amount;
        $this->conexion = new Conexion();
        $this->saleProductDAO = new SaleProductDAO($this->id_sale, $this->id_product, $this->amount);
    }

    public function create()
    {
        $this->conexion->conectar();
        $this->conexion->ejecutar($this->saleProductDAO->create());
        $this->conexion->cerrarConexion();
    }
}
