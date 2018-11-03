<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 3.11.2018 г.
 * Time: 14:34 ч.
 */

namespace Database;


use PDOStatement;

class PDOPrepareStatement implements PrepareStatementInterface
{
    private $pdoStatement;
    
    public function __construct(PDOStatement $pdoStatement)
    {
        $this->pdoStatement=$pdoStatement;
    }

    public function execute(?array $params = null): ResultSetInterface
    {
        $this->pdoStatement->execute($params);
        return new PDOResultSet($this->pdoStatement);
    }
}