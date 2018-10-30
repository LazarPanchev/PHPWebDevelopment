<?php

namespace Models;
use PDO;

class Categories
{
    /**
     * @var PDO
     */
    private $db;

    /**
     * Products constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    public function getList(){
        $statement = $this->db->query('SELECT cat_id, cat_name
                                               FROM categories');

        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {             //equal to fetchAll - return a array
            yield $row;                                                           //using yield no need to return the variable brings the iterator
        }
    }
}