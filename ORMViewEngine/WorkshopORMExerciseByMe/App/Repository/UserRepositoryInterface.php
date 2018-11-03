<?php

namespace App\Repository;

use App\Data\UserDTO;
use \Generator;

interface UserRepositoryInterface
{
    public function findOneByUsername(string $username) :?UserDTO;
    public function insert(UserDTO $user) :bool;
    public function findOneById(string $id) :?UserDTO;
    public function update(UserDTO $user,string  $id) :bool;

    /**
     * @return Generator|UserDTO[]
     */
    public function findAll(): Generator;

}