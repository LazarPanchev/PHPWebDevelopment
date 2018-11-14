<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 6.11.2018 г.
 * Time: 8:51
 */

namespace Database;
use App\Data\UserDTO;
use Generator;

interface ResultSetInterface
{
    public function fetchAll(?string $className=null):Generator;
    public function fetchOne(?string $className=null): UserDTO;
}