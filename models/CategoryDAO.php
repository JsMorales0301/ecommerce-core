<?php

class CategoryDAO
{
    private $id;
    private $category;

    public function __construct($id, $category)
    {
        $this->id = $id;
        $this->category = $category;
    }

    public function getAll()
    {
        return "SELECT * FROM category";
    }

    public function getById($id)
    {
        return "SELECT * FROM category WHERE id = $id";
    }
    public function crear()
    {
        return "insert into category(category)
            values('" . $this->category . "')";
    }

    public function actualizar()
    {
        return "update category set
                category = '" . $this->category . "'
                where id = '" . $this->id . "'";
    }
    public function eliminar()
    {
        return "delete from category where id = " . $this->id;
    }
}
