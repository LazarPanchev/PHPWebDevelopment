<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 1.11.2018 г.
 * Time: 18:28
 */

namespace Database;


interface ResultSetInterface
{
    public function fetchAll(?string $className=null):\Generator;
}