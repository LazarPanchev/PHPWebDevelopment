<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 13.11.2018 г.
 * Time: 18:27
 */

namespace App\Repository;


use App\DTO\GenreDTO;

interface GenreRepositoryInterface
{
    public function findById(int $id): ?GenreDTO;
    public function findAll():\Generator;
}