<?php
$host='localhost';
$username='root';
$password='';
$dbname='softuni';
$mysqli=new mysqli($host,$username,$password,$dbname,3306);
if($mysqli->connect_errno){
    die('Cannot connect to MySQL!');
}
?>