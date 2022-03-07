<?php

require_once 'C:\xampp\htdocs\ecommerce-core\models\ProductDAO.php';
require_once 'C:\xampp\htdocs\ecommerce-core\db\connection.php';

class ProductController
{
    private $id;
    private $name;
    private $description;
    private $price;
    private $image;
    private $stock;
    private $id_category;
    private $conexion;
    private $productDAO;

    public function __construct($id = 0, $name = "", $description = "", $price = 0, $image = "", $stock = 0, $id_category = 0)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;
        $this->stock = $stock;
        $this->id_category = $id_category;
        $this->conexion = new Conexion();
        $this->productDAO = new ProductDAO($this->id, $this->name, $this->description, $this->price, $this->image, $this->stock, $this->id_category);
    }



    public function getProducts()
    {
        $this->conexion->conectar();
        $this->conexion->ejecutar($this->productDAO->getProducts());
        $productos = array();
        if ($this->conexion->numFilas() > 0) {
            while ($row = $this->conexion->fetch()) {
                $productos[] = $row;
            }
        }
        $this->conexion->cerrarConexion();
        return $productos;
    }

    public function getProductById($id)
    {
        $this->conexion->conectar();
        $this->conexion->ejecutar($this->productDAO->getProductById($id));
        $productos = array();
        if ($this->conexion->numFilas() > 0) {
            while ($row = $this->conexion->fetch()) {
                $productos[] = $row;
            }
        }
        $this->conexion->cerrarConexion();
        return $productos;
    }

    public function getProductPaginate($pagina, $regPag)
    {
        $this->conexion->conectar();
        $this->conexion->ejecutar($this->productDAO->getProductPaginate($pagina, $regPag));
        $productos = array();
        if ($this->conexion->numFilas() > 0) {
            while ($row = $this->conexion->fetch()) {
                $productos[] = $row;
            }
        }
        $this->conexion->cerrarConexion();
        return $productos;
    }

    public function __toString()
    {
        return "ProductDAO{" .
            "id=" . $this->id .
            ", name='" . $this->name . '\'' .
            ", description='" . $this->description . '\'' .
            ", price=" . $this->price .
            ", image='" . $this->image . '\'' .
            ", stock=" . $this->stock .
            ", id_category=" . $this->id_category .
            '}';
    }

    /**
     * @return int|mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int|mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed|string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed|string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed|string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed|string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return int|mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param int|mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed|string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed|string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return int|mixed
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * @param int|mixed $stock
     */
    public function setStock($stock)
    {
        $this->stock = $stock;
    }

    /**
     * @return int|mixed
     */
    public function getIdCategory()
    {
        return $this->id_category;
    }

    /**
     * @param int|mixed $id_category
     */
    public function setIdCategory($id_category)
    {
        $this->id_category = $id_category;
    }

    /**
     * @return Conexion
     */
    public function getConexion()
    {
        return $this->conexion;
    }

    /**
     * @param Conexion $conexion
     */
    public function setConexion($conexion)
    {
        $this->conexion = $conexion;
    }

    /**
     * @return ProductDAO
     */
    public function getProductDAO()
    {
        return $this->productDAO;
    }

    /**
     * @param ProductDAO $productDAO
     */
    public function setProductDAO($productDAO)
    {
        $this->productDAO = $productDAO;
    }
}
