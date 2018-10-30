<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 30.10.2018 г.
 * Time: 15:14
 */

namespace Database;


interface PreparedStatementInterface
{
    public function execute(?array $params=null) : ResultSetInterface;
}