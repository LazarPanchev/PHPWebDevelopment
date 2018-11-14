<?php

namespace Database;
use \PDOStatement;

class PDOResultSet implements ResultSetInterface
{
    /**
     * @var PDOStatement
     */
    private $pdoStatement;

    public function __construct(PDOStatement $pdoStatement)
    {
        $this->pdoStatement=$pdoStatement;
    }

    public function fetch(?string $className = null): \Generator
    {
        if($className===null){
            while ($row=$this->pdoStatement->fetch(\PDO::FETCH_ASSOC)){
                yield $row;
            }
        }else{
            while ($row=$this->pdoStatement->fetchObject($className)){
                yield $row;
            }
        }
    }
}