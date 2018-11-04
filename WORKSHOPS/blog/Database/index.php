<?php
spl_autoload_register();
use Database\DatabaseInterface;
use Database\PDODatabase;

$pdo= new PDO("mysql:host=localhost:3306;dbname=blog","root","");

$db=new PDODatabase($pdo);

$statement = $db->query('SELECT username, full_name AS `fullName` FROM users');
$resultSet= $statement->execute();
$allUsers=$resultSet->fetchAll(User::class);

//$query = $pdo->query('SELECT * FROM users');

/**
 * @var User $user
 */
foreach ($allUsers as $user){
    echo $user->getUsername() .  " " . $user->getFullName() . PHP_EOL;
}