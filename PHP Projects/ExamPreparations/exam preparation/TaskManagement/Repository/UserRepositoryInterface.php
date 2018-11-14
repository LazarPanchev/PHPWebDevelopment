<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 8.11.2018 г.
 * Time: 20:32 ч.
 */

namespace TaskManagement\Repository;


use TaskManagement\DTO\userDTO;

interface UserRepositoryInterface
{
    public function findOneByUsername(string $username) :?UserDTO;
    public function insert(UserDTO $user) :bool;
    public function findOneById(string $id) :?UserDTO;
}