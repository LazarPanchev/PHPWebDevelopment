<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 30.10.2018 г.
 * Time: 15:24
 */

namespace Database;
use PDO;
use PDOStatement;

class PDODatabase implements DatabaseInterface
{
    /**
     * @var PDO
     */
    private $pdo;

    /**
     * PDODatabase constructor.
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo=$pdo;
    }

    public function query(string $query): PreparedStatementInterface
    {
       $statement=$this->pdo->prepare($query);
       return new PDOPreparedStatement( $statement);
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