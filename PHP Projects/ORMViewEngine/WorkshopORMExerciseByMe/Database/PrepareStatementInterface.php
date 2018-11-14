<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 3.11.2018 г.
 * Time: 14:34 ч.
 */

namespace Database;


interface PrepareStatementInterface
{
    public function execute(?array $params=null):ResultSetInterface;
}