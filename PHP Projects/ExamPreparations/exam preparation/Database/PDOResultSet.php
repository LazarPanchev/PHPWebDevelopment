<?php

namespace Database;
use PDOStatement;

class PDOResultSet implements ResultSetInterface
{
    private $pdoStatement;

    public function __construct(PDOStatement $pdoStatement )
    {
        $this->pdoStatement=$pdoStatement;
    }

    public function fetchAll(?string $className=null): \Generator
    {
//        while ($row=$this->pdoStatement->fetchObject($className)){
//            yield $row;
//        }
        if($className === null){
            while ($row = $this->pdoStatement->fetch(\PDO::FETCH_ASSOC)){
                yield $row;
            }
        }else {
            while ($row = $this->pdoStatement->fetchObject($className)) {
                yield $row;
            }
        }
    }

    public function fetchOne(?string $className=null)
    {
        return ($row=$this->pdoStatement->fetchObject($className));
    }
}