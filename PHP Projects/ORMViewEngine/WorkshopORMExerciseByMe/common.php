<?php
spl_autoload_register();
session_start();

use \Database\PDODatabase;
use \App\Service\UserService;
use \App\Repository\UserRepository;
use \App\Http\HttpHandler;
use \Core\Template;
use \Core\DataBinder;

$configDb=parse_ini_file('config/configDb.ini');
$pdo=new PDO($configDb['dsn'],$configDb['username'],$configDb['pass']);
$db=new PDODatabase($pdo);


$userRepository= new UserRepository($db);
$userService=new UserService($userRepository);
$template=new Template();
$userHttpHandler=new HttpHandler($template,new DataBinder());