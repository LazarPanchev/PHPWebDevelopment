<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 1.11.2018 г.
 * Time: 22:57 ч.
 */

namespace App\Service;
use App\Data\UserDTO;

interface UserServiceInterface
{
    public function register(UserDTO $userDTO, string $confirmPassword):bool;
    public function login(string $username, string $password): ?UserDTO;
    public function currentUser(): ?UserDTO;
    public function edit(UserDTO $userDTO):bool;

    /**
     * @return \Generator|UserDTO[]
     */
    public function all() :\Generator;
}