<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 3.11.2018 г.
 * Time: 14:38 ч.
 */

namespace Database;
use Generator;
use PDOStatement;

class PDOResultSet implements ResultSetInterface
{
    private $pdoStatement;

    public function __construct(PDOStatement $pdoStatement)
    {
        $this->pdoStatement=$pdoStatement;
    }

    public function fetchAll(?string $className=null): Generator
    {
        while ($row=$this->pdoStatement->fetchObject($className)){
            yield $row;
        }
    }

    public function fetchOne(string $className=null){
        return $this->pdoStatement->fetchObject($className);
    }
}