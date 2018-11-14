<?php
require_once './common.php';

$userRepository= new \TaskManagement\Repository\UserRepository($database);
$userService=new \TaskManagement\Service\UserService($userRepository);

$userHttpHandler=new \TaskManagement\Http\UserHttpHandler($template,$dataBinder,$dataBinderError);

$userHttpHandler->login($userService, $_POST);