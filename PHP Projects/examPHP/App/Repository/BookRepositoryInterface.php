<?php

namespace App\Repository;


use App\DTO\BookDTO;

interface BookRepositoryInterface
{
    public function findAll(): \Generator;
    public function findOneById(int $id): ?BookDTO;
    public function findAllById(int $id): \Generator;
    public function insert(BookDTO $bookDTO):bool;
    public function update(BookDTO $editedBookDTO, int $id):bool;
    public function delete(int $id):bool;

}