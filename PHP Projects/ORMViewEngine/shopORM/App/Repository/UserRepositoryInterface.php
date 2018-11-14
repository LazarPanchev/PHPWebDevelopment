<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 6.11.2018 г.
 * Time: 9:59
 */

namespace App\Repository;


use App\Data\UserDTO;
use Generator;

interface UserRepositoryInterface
{
    public function insert(UserDTO $user):bool;
    public function findOneByUsername(string $username) :?UserDTO;
    public function findOneById(int $id) :?UserDTO;
    public function update(int $id, UserDTO $userDTO) :bool;
    /**
     * @return \Generator|UserDTO[]
     */
    public function getAllUsers() :Generator;
}