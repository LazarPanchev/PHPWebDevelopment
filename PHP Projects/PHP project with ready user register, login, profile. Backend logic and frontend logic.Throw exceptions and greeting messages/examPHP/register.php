<?php
use App\Repository\UserRepository;
use App\Service\UserService;
use App\Http\UserHttpHandler;

require_once './common.php';

$userRepository= new UserRepository($pdoDB);
$userService= new UserService($userRepository);
$userHttpHandler= new UserHttpHandler($template,$dataBinder);
$userHttpHandler->register($userService,$_POST);