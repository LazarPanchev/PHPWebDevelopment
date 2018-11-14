<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 6.11.2018 г.
 * Time: 9:55
 */

namespace App\Service;
use App\Data\UserDTO;
use Generator;

interface UserServiceInterface
{
    public function register(UserDTO $user,string  $confirmPassword):bool;
    public function login(string $username, string $password): ?UserDTO;
    public function currentUser(): ?UserDTO;
    public function edit(UserDTO $userDTO) :bool;

    /**
     * @return Generator|UserDTO[]
     */
    public function all():Generator;
}