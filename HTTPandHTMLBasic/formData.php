<?php
if(isset($_GET['name']) && isset($_GET['age']) && isset($_GET['gender'])){
    $name=$_GET['name'];
    $age=$_GET['age'];
    $gender=$_GET['gender'];

    echo "My name is $name. I am $age years old. I am $gender.";
}
?>