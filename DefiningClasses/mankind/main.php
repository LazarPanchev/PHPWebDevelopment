<?php
spl_autoload_register();


$studentTokens=explode(' ', readline());
$studentFirstName=$studentTokens[0];
$studentLastName=$studentTokens[1];
$facultyNumber=$studentTokens[2];
try{
    $student=new Student($studentFirstName,$studentLastName,$facultyNumber);

}catch (Exception $e){
    echo $e->getMessage();
    exit;
}

$workerTokens=explode(' ', readline());
$workerFirstName=$workerTokens[0];
$workerLastName=$workerTokens[1];
$salary=floatval($workerTokens[2]);
$workingHours=intval($workerTokens[3]);

try{
    $worker=new Worker($workerFirstName,$workerLastName,$salary,$workingHours);
}catch (Exception $e){
    echo $e->getMessage();
    exit;
}

echo $student;
echo $worker;
?>