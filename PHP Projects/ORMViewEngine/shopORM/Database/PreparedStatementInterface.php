<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 6.11.2018 г.
 * Time: 8:46
 */

namespace Database;


interface PreparedStatementInterface
{
    public function execute(?array $params=null):ResultSetInterface;
}