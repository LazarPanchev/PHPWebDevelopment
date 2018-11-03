<?php


namespace Database;
use PDO;

class PDODatabase implements DatabaseInterface
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo=$pdo;
    }

    public function query(string $query): PrepareStatementInterface
    {
        $pdoStatement=$this->pdo->prepare($query);
        return new PDOPrepareStatement($pdoStatement);
    }

    public function getLastError(): array
    {
        return $this->pdo->errorInfo();
    }

    public function getLastId():int
    {
        return $this->pdo->lastInsertId();
    }
}