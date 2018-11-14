<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 30.10.2018 г.
 * Time: 15:25
 */

namespace Database;
use PDOStatement;
use DTO\ProductDTO;

class ResultSet implements ResultSetInterface
{
    /**
     * @var PDOStatement
     */
    private $pdoStatement;

    public function __construct(PDOStatement $pdoStatement)
    {
        $this->pdoStatement=$pdoStatement;
    }

    public function fetchAll($className): \Generator
    {
        while ($row=$this->pdoStatement->fetchObject($className)){
            yield $row;
        }
    }

    public function fetchOne($className){
        return $this->pdoStatement->fetchObject($className);
    }
}