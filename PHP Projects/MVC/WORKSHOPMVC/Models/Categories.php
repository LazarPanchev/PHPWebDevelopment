<?php

namespace Models;
use Database\PDODatabase;
use DTO\CategoriesDTO;

class Categories
{
    /**
     * @var PDODatabase
     */
    private $db;

    /**
     * Categories constructor.
     * @param PDODatabase $db
     */
    public function __construct(PDODatabase $db)
    {
        $this->db = $db;
    }
    public function getList():\Generator{
        $statement = $this->db->query('SELECT cat_id AS categoryId,
                                              cat_name AS categoryName
                                              FROM categories');
        $resultSet=$statement->execute();
        foreach($resultSet->fetchAll(CategoriesDTO::class) as $row) {             //equal to fetchAll - return a array
            yield $row;                                                           //using yield no need to return the variable brings the iterator
        }
    }
}