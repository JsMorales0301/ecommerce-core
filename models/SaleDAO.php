<?php

class SaleDAO
{
    private $id;
    private $date;
    private $id_seller;
    private $id_client;


    public function __construct($id = 0, $date = "", $id_seller = 0, $id_client = 0)
    {
        $this->id = $id;
        $this->date = $date;
        $this->id_seller = $id_seller;
        $this->id_client = $id_client;
    }

    public function createSale()
    {
        return "insert into sale(id, date, id_seller_fk, id_client_fk) values('" . $this->id . "', '" . $this->date . "', " . $this->id_seller . ", " . $this->id_client . ")";
    }

    public function getSale()
    {
        return "select * from sale ORDER by id DESC";
    }
    public function getSaleBySeller()
    {
        return "SELECT * FROM sale as s
                INNER JOIN sale_product as sp on s.id=sp.id_sale
                INNER JOIN product as p on p.id = sp.id_product
                WHERE p.id_user_fk =".$this->id_seller.";";
    }
}
