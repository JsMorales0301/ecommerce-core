<?php

class ChartDAO
{
    private $label;
    private $amount;


    public function __construct($label="", $amount = 0)
    {
        $this->label = $label;
        $this->amount = $amount;
    }

    public function getSellerProducts($id_user)
    {
        return "
        SELECT name as 'label' , COUNT(*) as 'amount'
        FROM sale_product
        INNER JOIN product p on id_product = p.id
        INNER JOIN user u on id_user_fk = u.id
        WHERE id_user_fk =".$id_user."
        GROUP BY id_product
        ORDER BY COUNT(*) DESC
        LIMIT 5;
        ";
    }
    public function getAdminSells()
    {
        return "  
        SELECT username as 'label' , COUNT(*) as 'amount'
        FROM sale_product
        INNER JOIN product p on id_product = p.id
        INNER JOIN user u on id_user_fk = u.id
        GROUP BY id_user_fk
        ORDER BY COUNT(*) DESC
        LIMIT 5;
        ";
    }
}
