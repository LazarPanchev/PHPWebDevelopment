<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 30.10.2018 г.
 * Time: 15:21
 */

namespace Database;

use DTO\ProductDTO;

interface ResultSetInterface
{
    public function fetchAll($className): \Generator;

    public function fetchOne($className);

}