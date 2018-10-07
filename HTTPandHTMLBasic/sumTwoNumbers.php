<?php

if(isset($_GET['num1']) && isset($_GET['num2'])){
    $firstNum=$_GET['num1'];
    $secondNum=$_GET['num2'];
    $sum=$firstNum+$secondNum;
    echo "$firstNum + $secondNum = $sum";
}
?>

<form>
    <div>First Number:</div>
    <input type="number" name="num1" />
    <div>Second Number:</div>
    <input type="number" name="num2" />
    <div><input type="submit"/></div>
</form>




