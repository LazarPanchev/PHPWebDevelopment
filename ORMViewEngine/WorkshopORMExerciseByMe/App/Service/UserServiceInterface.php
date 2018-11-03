<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 3.11.2018 г.
 * Time: 15:07 ч.
 */

namespace App\Service;
use \App\Data\UserDTO;
use Generator;

interface UserServiceInterface
{
    public function register(UserDTO $userDTO, string $confirmPassword) :bool;
    public function login(string $username, string $password) :?UserDTO;
    public function currentUser() :?UserDTO;
    public function edit(UserDTO $userDTO) :bool;
    public function allUsers() :Generator;
}