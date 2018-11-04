<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 29.10.2018 г.
 * Time: 20:10 ч.
 */

namespace Database;


interface PreparedStatementInterface
{
    public function execute(array $params=[]): ResultSetInterface;
}