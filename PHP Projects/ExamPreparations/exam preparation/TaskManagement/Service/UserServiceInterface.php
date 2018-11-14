<?php

namespace TaskManagement\Service;


use TaskManagement\DTO\userDTO;

interface UserServiceInterface
{
    public function register(UserDTO $userDTO, string $confirmPassword): void;
    public function login(string $username, string $password) :?UserDTO;
    public function currentUser() :?UserDTO;
   // public function findOne(string $username) :?UserDTO;
    public function isLogged():bool;

}