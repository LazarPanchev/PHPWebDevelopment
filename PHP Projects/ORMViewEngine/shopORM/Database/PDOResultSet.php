<?php

namespace Database;


use PDOStatement;
use App\Data\UserDTO;

class PDOResultSet implements ResultSetInterface
{
    /**
     * @var PDOStatement
     */
    private $pdoStatement;

    public function __construct(PDOStatement $pdoStatement)
    {
        $this->pdoStatement=$pdoStatement;
    }

    public function fetchAll(?string $className=null): \Generator
    {
        while($row=$this->pdoStatement->fetchObject($className)){
            yield $row;
        }
    }

    public function fetchOne(?string $className=null): UserDTO
    {
        $row=$this->pdoStatement->fetchObject($className);
        return $row;
    }
}