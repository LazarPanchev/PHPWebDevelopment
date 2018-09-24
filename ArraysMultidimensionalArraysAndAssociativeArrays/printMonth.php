<?php
$num=intval(readline());
if($num<1 || $num>12){
    echo "Invalid Month!";
}else{
    $months=array(0=>'January',1=>'February',2=>'March',3=>'April',4=>'May',5=>'June',
        6=>'July',7=>'August',8=>'September',9=>'October',10=>'November',11=>'December');
    echo $months[$num-1];
}


?>