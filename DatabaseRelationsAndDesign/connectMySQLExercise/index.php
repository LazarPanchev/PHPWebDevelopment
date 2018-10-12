<?php

include ('connect_db.php');

$result=$mysqli->query('SELECT * FROM posts ORDER BY date DESC');

while ($row=$result->fetch_assoc()){
    //print_r($row);
    echo $row['title'];
}