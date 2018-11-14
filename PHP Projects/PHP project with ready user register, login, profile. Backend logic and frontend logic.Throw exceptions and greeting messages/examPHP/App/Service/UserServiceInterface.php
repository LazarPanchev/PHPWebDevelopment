<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 12.11.2018 г.
 * Time: 17:11
 */

namespace App\Service;


use App\DTO\UserDTO;

interface UserServiceInterface
{
    public function register(UserDTO $user, string $confirmPassword):bool;
    public function login(string $username, string $password):?UserDTO;
    public function getCurrentUser():?UserDTO;
}