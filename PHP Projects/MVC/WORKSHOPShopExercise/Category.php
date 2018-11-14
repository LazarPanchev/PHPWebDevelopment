<?php

class Category
{
    /**
     * @var PDO
     */
    private $db;

    public function __construct(PDO $db)
    {
        $this->db=$db;

    }

    public function getCategories(){
        $statement=$this->db->query('SELECT cat_id, cat_name
                                                FROM categories 
                                                ORDER BY cat_id;');
        while ($row=$statement->fetch(PDO::FETCH_ASSOC)){
            yield $row;
        }
    }
}