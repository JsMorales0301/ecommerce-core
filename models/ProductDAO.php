<?php

class ProductDAO
{
    private $id;
    private $name;
    private $description;
    private $price;
    private $image;
    private $stock;
    private $id_category;

    public function __construct($id, $name, $description, $price, $image, $stock, $id_category)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;
        $this->stock = $stock;
        $this->id_category = $id_category;
    }

    public function getProducts()
    {
        return "SELECT id, name, description, price, image, stock, id_category_fk FROM product";
    }

    public function getProductById($id)
    {
        return "SELECT * FROM product WHERE id = $id";
    }

    public function getProductPaginate($pagina, $regPag)
    {
        return "SELECT * FROM product LIMIT $pagina,$regPag";
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
}
