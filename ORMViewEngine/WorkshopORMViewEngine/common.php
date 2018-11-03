<?php

spl_autoload_register();
session_start();

use \App\Repository\UserRepository;
use \Database\PDODatabase;
use \App\Service\UserService;
use \Core\DataBinder;
use \Core\Template;
use \App\Http\HttpHandler;

$template= new Template();
$userHttpHandler= new HttpHandler($template, new DataBinder());

$dbInfo=parse_ini_file("Config/db.ini");
$pdo= new PDO($dbInfo['dsn'],$dbInfo['user'], $dbInfo['pass']);//,[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
$db= new PDODatabase($pdo);
$userRepository= new UserRepository($db);
$userService= new UserService($userRepository);
