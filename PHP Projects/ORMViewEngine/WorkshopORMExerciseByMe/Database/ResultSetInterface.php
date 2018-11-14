<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 3.11.2018 г.
 * Time: 14:36 ч.
 */

namespace Database;
use \Generator;

interface ResultSetInterface
{
    public function fetchAll(?string $className=null):Generator;

}