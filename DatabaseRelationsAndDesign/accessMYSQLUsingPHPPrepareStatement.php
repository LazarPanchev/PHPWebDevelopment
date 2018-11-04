<?php

$db= new mysqli('localhost','root','','phpexercise',3306);
if($db->connect_error){
    echo $db->connect_error;
    exit;
}
$name='stamat';
$result=$db->prepare('DELETE FROM employees WHERE name=?');
$result->bind_param('s',$name);
$result->execute();
echo $result->affected_rows;


