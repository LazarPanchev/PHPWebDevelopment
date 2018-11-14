<?php

spl_autoload_register();
session_start();

use Database\PDODatabase;
use Core\Template;
use App\Service\UserService;
use App\Repository\UserRepository;
use App\Http\HttpHandler;
use Core\DataBinder;


$dbInfo=parse_ini_file('Config/config.ini');
$pdo= new PDO($dbInfo['dsn'],$dbInfo['user'],$dbInfo['pass']);

$database=new PDODatabase($pdo);
$userRepository=new UserRepository($database);

$userService=new UserService($userRepository);

$template = new Template();
$httpHandler= new HttpHandler($template, new DataBinder());
