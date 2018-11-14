<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 1.11.2018 г.
 * Time: 18:27
 */

namespace Database;


interface PreparedStatementInterface
{
    public function execute(?array $params=null):ResultSetInterface;
}