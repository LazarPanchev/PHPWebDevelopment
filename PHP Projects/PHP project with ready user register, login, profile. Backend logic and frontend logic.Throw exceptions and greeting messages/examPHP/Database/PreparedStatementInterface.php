<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 12.11.2018 г.
 * Time: 15:27
 */

namespace Database;


interface PreparedStatementInterface
{
    public function execute(?array $params=null):ResultSetInterface;

}