<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 29.10.2018 г.
 * Time: 20:20 ч.
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
        $statement=$this->pdo->prepare($query);
        return new PDOPreparedStatement($statement);
    }

    public function getLastError()
    {
        // TODO: Implement getLastError() method.
    }

    public function getLastId()
    {
        // TODO: Implement getLastId() method.
    }
}