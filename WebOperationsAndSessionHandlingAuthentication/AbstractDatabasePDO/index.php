<?php
spl_autoload_register();

use Database\User;
use Database\PDODatabase;

$pdo= new PDO("mysql:host=localhost:3306;dbname=sessions_exercise","root",'');

$db=new PDODatabase($pdo);
$statement = $db->query("SELECT user_name AS username, password FROM users");
$resultSet= $statement->execute();
$users=$resultSet->fetchAll(User::class);
/**
 * @var User $user
 */
foreach ($users as $user){
    echo $user->getUsername() . " " . $user->getPassword() . "<br />";
}


//Like LINQ Queries
//$allUsers=$db   //every step returns objects!!!
//    ->query("SELECT user_name AS username, password FROM users")
//    ->execute()
//    ->fetchAll(User::class);
//foreach ($allUsers as $user){
//    echo $user->getUsername() . " " . $user->getPassword() . "<br />";
//}


//NORMAL WAY WITHOUT CLASSES AND INTERFACES
//$query=$pdo->prepare("SELECT user_name AS username, password FROM users");
//$query->execute();
//
///**
// * @var User $user
// */
//while ($user=$query->fetchObject(User::class)){
//    echo $user->getUsername() . " " . $user->getPassword() . "<br />";
//}



//$users=$query->fetchAll(PDO::FETCH_ASSOC);
//
//foreach ($users as $user){
//    echo $user['username'] . " " . $user['password'] . "<br />";
//}