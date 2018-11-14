<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 12.11.2018 г.
 * Time: 15:25
 */

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
        $prepareStatement = $this->pdo->prepare($query);
        return new PDOPreparedStatement($prepareStatement);
    }

    public function error()
    {
        return $this->pdo->errorInfo();
    }

    public function lastInsertId(): int
    {
        return $this->pdo->lastInsertId();
    }
}