<?php
 $host='localhost';
 $userDB='root';
 $passDB='';
 $nameDB='softuni'; //database name
 $portDB='3306'; //default port

    $mysqli=new mysqli($host,$userDB,$passDB,$nameDB,$portDB);
    $mysqli->set_charset('utf8');

    if($mysqli->connect_errno){
        die("Cannot connect to MySQL");
    }
?>