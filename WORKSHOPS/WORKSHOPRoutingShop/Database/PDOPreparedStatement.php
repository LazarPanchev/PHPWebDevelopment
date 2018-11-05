<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 30.10.2018 г.
 * Time: 15:25
 */

namespace Database;
use PDOStatement;

class PDOPreparedStatement implements PreparedStatementInterface
{
    /**
     * @var PDOStatement
     */
    private $pdoStatement;

    public function __construct(PDOStatement $pdoStatement)
    {
        $this->pdoStatement=$pdoStatement;
    }

    public function execute(?array $params = null): ResultSetInterface
    {
        $this->pdoStatement->execute($params);   //$params = WHERE id=..
        return new ResultSet($this->pdoStatement);
    }
}