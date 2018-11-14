<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 29.10.2018 г.
 * Time: 20:24 ч.
 */

namespace Database;

class PDOPreparedStatement implements PreparedStatementInterface
{
    private $pdoStatement;

    public function __construct(\PDOStatement $PDOStatement)
    {
            $this->pdoStatement=$PDOStatement;
    }

    public function execute(array $params = []): ResultSetInterface
    {
            $this->pdoStatement->execute($params);
            return new PDOResultSet($this->pdoStatement);
    }
}