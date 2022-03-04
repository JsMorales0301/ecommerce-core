<?php
require_once 'C:\xampp\htdocs\ecommerce-core\db\connection.php';
require_once 'C:\xampp\htdocs\ecommerce-core\models\CategoryDAO.php';

class CategoryController{
    private $id;
    private $category;
    private $categoryDAO;
    public function __construct($id=0, $category="")
    {
        $this->id = $id;
        $this->category = $category;
        $this->conexion = new Conexion();
        $this->categoryDAO = new CategoryDAO($this->id, $this->category);
    }

    public function crear(){
        $this -> conexion -> conectar();
        $this -> conexion -> ejecutar($this -> categoryDAO -> crear());
        $this -> conexion -> cerrarConexion();
    }
    public function actualizar(){
        $this -> conexion -> conectar();
        $this -> conexion -> ejecutar($this -> categoryDAO -> actualizar());
        $this -> conexion -> cerrarConexion();
    }
    public function eliminar(){
        $this -> conexion -> conectar();
        $this -> conexion -> ejecutar($this -> categoryDAO -> eliminar());
        $this -> conexion -> cerrarConexion();
    }
    public function getAll(){
        $this->conexion->conectar();
        $this -> conexion -> ejecutar($this -> categoryDAO -> getAll());
        $categories = array();
        if($this -> conexion ->numFilas() > 0) {
            while ($row = $this->conexion->fetch()) {
                $categories[] = $row;
            }
        }
        $this -> conexion -> cerrarConexion();
        return $categories;
    }
    public function getById($id){
        $this->conexion->conectar();
        $this -> conexion -> ejecutar($this -> categoryDAO -> getById($id));
        $categories = array();
        if($this -> conexion ->numFilas() > 0) {
            while ($row = $this->conexion->fetch()) {
                $categories[] = $row;
            }
        }
        $this -> conexion -> cerrarConexion();
        return $categories;
    }
}
?>