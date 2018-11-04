<?php

$db= new mysqli('localhost','root','','soft_uni',3306);
if($db->connect_error){
    echo $db->connect_error;
    exit;
}
$result=$db->query('SELECT first_name as firstName, last_name as lastName FROM employees');
while($row=$result->fetch_assoc()){
    echo $row['firstName'] . ' ' . $row['lastName'] . PHP_EOL;
}