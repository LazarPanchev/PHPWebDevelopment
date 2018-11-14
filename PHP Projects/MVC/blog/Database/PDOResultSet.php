<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 29.10.2018 г.
 * Time: 20:27 ч.
 */

namespace Database;


class PDOResultSet implements ResultSetInterface
{
    private $pdoStatement;

    public function __construct(\PDOStatement $PDOStatement)
    {
        $this->pdoStatement=$PDOStatement;
    }

    public function fetchAll(?string $className = null)
    {
        while ($row = $this->pdoStatement->fetchObject($className)){
            yield $row;
        }
    }
}