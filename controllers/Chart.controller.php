<?php

require_once 'C:\xampp\htdocs\ecommerce-core\models\ChartDAO.php';
require_once 'C:\xampp\htdocs\ecommerce-core\db\connection.php';

class ChartController
{
    private $label;
    private $amount;
    private $chartDAO;

    public function __construct($label = "", $amount = 0)
    {
        $this->label = $label;
        $this->amount = $amount;
        $this->conexion = new Conexion();
        $this->chartDAO = new ChartDAO($this->label, $this->amount);
    }
    public function getSellerProducts($id_user)
    {
        $this->conexion->conectar();
        $this->conexion->ejecutar($this->chartDAO->getSellerProducts($id_user));
        $products = array();
        if ($this->conexion->numFilas() > 0) {
            while ($row = $this->conexion->fetch()) {
                $products[] = $row;
            }
        }
        $this->conexion->cerrarConexion();
        return $products;
    }
    public function getAdminSells()
    {
        $this->conexion->conectar();
        $this->conexion->ejecutar($this->chartDAO->getAdminSells());
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
