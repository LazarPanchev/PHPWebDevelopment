<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 12.11.2018 г.
 * Time: 17:22
 */

namespace App\Repository;


use App\DTO\UserDTO;

interface UserRepositoryInterface
{
    public function insert(UserDTO $user):bool;
    public function findByUsername(string $username):?UserDTO;
    public function findById(int $id):?UserDTO;
}