<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 30.10.2018 г.
 * Time: 15:13
 */

namespace Database;


interface DatabaseInterface
{
    public function query(string $query): PreparedStatementInterface;

    public function getLastError();

    public function getLastId();

}