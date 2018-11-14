<?php

namespace Database;
use PDO;
use PDOStatement;

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
        $statement = $this->pdo->prepare($query);
        return new PDOPrepareStatement($statement);
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