<?php

namespace App\Service;


use App\DTO\GenreDTO;

interface GenreServiceInterface
{
    public function findOne(int $id): ?GenreDTO;
    public function getAll(): \Generator;
}