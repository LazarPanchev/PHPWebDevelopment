<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 12.11.2018 г.
 * Time: 15:23
 */

namespace Database;


interface DatabaseInterface
{
    public function query(string $query):PreparedStatementInterface;
    public function lastInsertId():int;
    public function error();
}