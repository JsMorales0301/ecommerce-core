<?php

class SaleDAO
{
    private $id;
    private $date;
    private $id_seller;
    private $id_client;
    private $state;
    private $total;


    public function __construct($id = 0, $date = "",$id_seller = 0, $id_client = 0, $state = 0, $total = 0)
    {
        $this->id = $id;
        $this->date = $date;
        $this->id_seller = $id_seller;
        $this->id_client = $id_client;
        $this->state = $state;
        $this->total = $total;
    }
    

    public function createSale()
    {
        return "INSERT INTO sale (id, date, id_client_fk, state, total) VALUES ('$this->id', '$this->date', '$this->id_client', '$this->state', '$this->total')";
    }

    public function getSale(){
        return "select * from sale ORDER by id DESC";
    }

    public function getSaleState($id_client){
        return "select id,state from sale where id_client_fk = '$id_client' ORDER by id DESC limit 1";
    }

    public function getSaleBySeller()
    {
        return "SELECT * FROM sale as s
                INNER JOIN sale_product as sp on s.id=sp.id_sale
                INNER JOIN product as p on p.id = sp.id_product
                WHERE p.id_user_fk =".$this->id_seller.";";
    }
}