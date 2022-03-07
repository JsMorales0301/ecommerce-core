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
}
