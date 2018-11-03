<?php

namespace Database;
use PDOStatement;

class PDOResultSet implements ResultSetInterface
{
    private $pdoStatement;

    public function __construct(PDOStatement $pdoStatement )
    {
        $this->pdoStatement=$pdoStatement;
    }

    public function fetchAll(?string $className=null): \Generator
    {
        while ($row=$this->pdoStatement->fetchObject($className)){
            yield $row;
        }
    }
}