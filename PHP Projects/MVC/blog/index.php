<?php

require_once('config.php');
require_once('functions.php');
session_start();
$requestParsed = parseRequest();
processRequest($requestParsed);


//spl_autoload_register();
//use Database\DatabaseInterface;
//use Database\PDODatabase;
//
//$pdo= new PDO("mysql:host=localhost:3306;dbname=blog","root","");
//
//$db=new PDODatabase($pdo);
//
//$statement = $db->query('SELECT username, password_hash AS password, full_name AS fullName FROM users');
//$resultSet= $statement->execute();
//$allUsers=$resultSet->fetchAll(User::class);
//
////$query = $pdo->query('SELECT * FROM users');
//
///**
// * @var User $user
// */
//foreach ($allUsers as $user){
//    echo $user->getUsername() . " " . $user->getPassword() . " " . $user->getFullName() . PHP_EOL;
//}
//
