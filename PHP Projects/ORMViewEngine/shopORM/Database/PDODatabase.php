<?php

namespace Database;
use PDO;

class PDODatabase implements DatabaseInterface
{
    /**
     * @var PDO
     */
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo=$pdo;
    }

    public function query(string $query): PreparedStatementInterface
    {
        $preparedStatement=$this->pdo->prepare($query);
        return new PDOPreparedStatement($preparedStatement);
    }

    public function getLastError()
    {
        return $this->pdo->errorInfo();
    }

    public function getLastId()
    {
        return $this->pdo->lastInsertId();
    }
}