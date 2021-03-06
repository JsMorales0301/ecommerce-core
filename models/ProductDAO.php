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
    private $id_user;

    public function __construct($id, $name, $description, $price, $image, $stock, $id_category,$id_user)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;
        $this->stock = $stock;
        $this->id_category = $id_category;
        $this->id_user = $id_user;

    }

    public function getProducts()
    {
        return "SELECT id, name, description, price, image, stock, id_category_fk FROM product";
    }

    public function getProductById($id)
    {
        return "SELECT * FROM product WHERE id = $id";
    }
    public function crear(){
        return "insert into product(id, name, description, price, image, stock,id_category_fk,id_user_fk)
            values('" . $this -> id . "', '" . $this -> name . "', '" . $this -> description . "', " . $this -> price . ", '" . $this -> image . "', " . $this -> stock . ", " . $this -> id_category . ", ". $this -> id_user .")";
    }
    public function getAllByLast()
    {
        return "SELECT * FROM product order by id DESC";
    }
    public function getAllBySeller()
    {
        return "SELECT * FROM product WHERE id_user_fk =".$this->id_user;
    }
    public function actualizar(){
        return "update product set
                name = '" . $this -> name . "',
                description = '" . $this -> description . "',
                price= '" . $this -> price . "',
                image = '" . $this -> image . "',
                stock = '" . $this -> stock . "',
                id_category_fk = '" . $this -> id_category . "'
                where id = '" . $this -> id . "'";
    }
    public function eliminar(){
        return "delete from product where id ". $this -> id;
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
