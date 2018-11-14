<?php

namespace App\Service;

use App\DTO\BookDTO;

interface BookServiceInterface
{
    public function findAll() :\Generator;
    public function findOne(int $id): BookDTO;
    public function findMine(int $id):\Generator;
    public function add(BookDTO $book) :bool;
    public function edit(BookDTO $editedBook, int $id):bool;
    public function remove(int $id):bool;
}