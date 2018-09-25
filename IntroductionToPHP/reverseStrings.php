<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 20.9.2018 г.
 * Time: 17:02
 */
$input=readline();
while ($input!=="end"){
    $reversedWord="";
    for($i=strlen($input)-1;$i>=0;$i--){
        $reversedWord.=$input[$i];
    }
    echo "$input = $reversedWord\n" ;
    $input=readline();
}
?>