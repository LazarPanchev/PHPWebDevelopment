<?php

require_once './common.php';

$userRepository= new \TaskManagement\Repository\UserRepository($database);
$userService=new \TaskManagement\Service\UserService($userRepository);

$homeHttpHandler =new \TaskManagement\Http\HomeHttpHandler($template, $dataBinder, $dataBinderError);
$homeHttpHandler->index($userService);