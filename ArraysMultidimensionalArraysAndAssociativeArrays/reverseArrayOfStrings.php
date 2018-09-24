<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 24.9.2018 г.
 * Time: 17:29 ч.
 */
$arrayInput=explode(' ',readline());

for($i=0;$i<count($arrayInput)/2;$i++){
    $temp=$arrayInput[$i];
    $arrayInput[$i]=$arrayInput[count($arrayInput)-$i-1];
    $arrayInput[count($arrayInput)-$i-1]=$temp;
}
echo implode(' ',$arrayInput);
//$result=array_reverse($arrayInput);
//echo implode(' ',$result);



?>