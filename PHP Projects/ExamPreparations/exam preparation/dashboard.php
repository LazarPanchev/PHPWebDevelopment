<?php
require_once './common.php';

$homeHttpHandler=new \TaskManagement\Http\HomeHttpHandler($template, $dataBinder,$dataBinderError);
$taskRepository= new \TaskManagement\Repository\TaskRepository($database, $dataBinder);
$taskService= new \TaskManagement\Service\TaskService($taskRepository);
$homeHttpHandler->dashboard($taskService);