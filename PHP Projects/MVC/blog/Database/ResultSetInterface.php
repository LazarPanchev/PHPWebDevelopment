<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 29.10.2018 г.
 * Time: 20:12 ч.
 */

namespace Database;


interface ResultSetInterface
{
    public function fetchAll(?string $className=null);//: \Generator;

}