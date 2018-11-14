<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 8.11.2018 г.
 * Time: 23:25 ч.
 */

namespace TaskManagement\Repository;
use TaskManagement\DTO\CategoryDTO;

interface CategoryRepositoryInterface
{
    /**
     * @return \Generator|CategoryDTO[]
     */
    public function findAll(): \Generator;

    public function findOne(int $id) :?CategoryDTO;
}