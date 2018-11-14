<?php

spl_autoload_register();
session_start();

$dbInfo=parse_ini_file('Config/db.ini');
$pdo=new PDO($dbInfo['dsn'],$dbInfo['user'],$dbInfo['pass'],[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
$pdoDB=new \Database\PDODatabase($pdo);

$template= new \Core\Template();
$dataBinder= new \Core\DataBinder();
