<?php

class SaleProductDAO
{
    private $id_sale;
    private $id_product;
    private $amount;


    public function __construct($id_sale = 0, $id_product = 0, $amount = 0)
    {
        $this->id_sale = $id_sale;
        $this->id_product = $id_product;
        $this->amount = $amount;
    }

    public function create()
    {
        return "insert into sale_product(id_sale, id_product, amount) values('" . $this->id_sale . "', '" . $this->id_product . "', " . $this->amount . ")";
    }

    public function getSaleProductById($id_sale)
    {
        return "select id_product, amount from sale_product where id_sale = " . $id_sale;
    }

    public function updateMountProduct($id_sale, $id_product, $amount)
    {
        return "update sale_product set amount = " . $amount . " where id_sale = " . $id_sale . " and id_product = " . $id_product;
    }

    public function deleteProduct($id_product, $id_sale)
    {
        return "delete from sale_product where id_product = " . $id_product . " and id_sale = " . $id_sale;
    }

    public function updateShopping($id, $date, $state, $total){
        return "update sale set date = '" . $date . "', state = '" . $state . "', total = " . $total . " where id = " . $id;
    }

    public function getSaleProductByIdSale($id_client)
    {
        return "SELECT * FROM sale_product sp INNER JOIN product p ON sp.id_product = p.id INNER JOIN sale s ON sp.id_sale = s.id where s.id_client_fk =" . $id_client;
    }

    
}
