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

    public function getSaleProductById($id_sale)
    {
        $this->conexion->conectar();
        $this->conexion->ejecutar($this->saleProductDAO->getSaleProductById($id_sale));
        $sale = array();
        if($this->conexion->numFilas() > 0)
        {
            while($fila = $this->conexion->fetch())
            {
                $sale[] = $fila;
            }
        }
        $this->conexion->cerrarConexion();
        return $sale;
    }

    public function updateMountProduct($id_sale, $id_product, $amount)
    {
        $this->conexion->conectar();
        $this->conexion->ejecutar($this->saleProductDAO->updateMountProduct($id_sale, $id_product, $amount));
        $this->conexion->cerrarConexion();
    }

    public function deleteProduct($id_product, $id_sale)
    {
        $this->conexion->conectar();
        $this->conexion->ejecutar($this->saleProductDAO->deleteProduct($id_product, $id_sale));
        $this->conexion->cerrarConexion();
    }

    public function updateShopping($id, $date, $state, $total)
    {
        $this->conexion->conectar();
        $this->conexion->ejecutar($this->saleProductDAO->updateShopping($id, $date, $state, $total));
        $this->conexion->cerrarConexion();
    }

    public function getSaleProductByIdSale($id_client)
    {
        $this->conexion->conectar();
        $this->conexion->ejecutar($this->saleProductDAO->getSaleProductByIdSale($id_client));
        $sale = array();
        if($this->conexion->numFilas() > 0)
        {
            while($fila = $this->conexion->fetch())
            {
                $sale[] = $fila;
            }
        }
        $this->conexion->cerrarConexion();
        return $sale;
    }

    
}
