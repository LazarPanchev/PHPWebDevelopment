<?php

require_once "./common.php";

$taskHttpHandler=new \TaskManagement\Http\TaskHttpHandler($template,$dataBinder,$dataBinderError);
$taskRepository= new \TaskManagement\Repository\TaskRepository($database, $dataBinder);
$taskService= new \TaskManagement\Service\TaskService($taskRepository);

$taskHttpHandler->delete($taskService, $_GET);