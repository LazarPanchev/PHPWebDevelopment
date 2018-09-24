<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 21.9.2018 г.
 * Time: 10:29 ч.
 */
$name=readline();
$age=intval(readline());
$grade=floatval(readline());
$grade=number_format($grade,2);
echo "Name: $name, Age: $age, Grade: $grade";

?>