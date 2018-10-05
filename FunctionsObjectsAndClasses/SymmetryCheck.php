<?php
$input=readline();

function isPalindrome($str){
    for ($i=0; $i<strlen($str)/2; $i++){
        if($str[$i]!=$str[strlen($str)-$i-1]){
            return false;
        }
    }
    return true;
}
echo isPalindrome($input) ? 'true' : 'false';
//$result=isPalindrome($input);
//if($result==true){
//    echo 'true';
//}else{
//    echo 'false';
//}

?>