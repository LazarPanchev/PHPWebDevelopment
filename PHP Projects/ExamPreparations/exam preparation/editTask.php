<?php

require_once "./common.php";
$userRepository= new \TaskManagement\Repository\UserRepository($database);
$userService=new \TaskManagement\Service\UserService($userRepository);

$taskRepository= new \TaskManagement\Repository\TaskRepository($database, $dataBinder);
$taskService=new \TaskManagement\Service\TaskService($taskRepository);

$categoryRepository= new \TaskManagement\Repository\CategoryRepository($database);
$categoryService= new \TaskManagement\Service\CategoryService($categoryRepository);

$taskHttpHandler=new \TaskManagement\Http\TaskHttpHandler($template,$dataBinder,$dataBinderError);

$taskHttpHandler->edit($taskService,$userService,$categoryService,$_POST,$_GET);
