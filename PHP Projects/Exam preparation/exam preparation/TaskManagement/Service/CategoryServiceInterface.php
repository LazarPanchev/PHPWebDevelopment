<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 9.11.2018 г.
 * Time: 7:47
 */

namespace TaskManagement\Service;


use TaskManagement\DTO\CategoryDTO;

interface CategoryServiceInterface
{
    /**
     * @return \Generator|CategoryDTO[]
     */
    public function getAll():\Generator;

    public function getOne(int $id):CategoryDTO;

}