<?php


namespace Database;
use PDOStatement;

class PDOPrepareStatement implements PreparedStatementInterface
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
        $this->pdoStatement->execute($params);
        return new PDOResultSet($this->pdoStatement);
    }
}