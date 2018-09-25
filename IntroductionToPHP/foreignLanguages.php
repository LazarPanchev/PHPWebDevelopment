<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 21.9.2018 г.
 * Time: 15:29
 */
$country=readline();
$language="unknown";
if($country==="USA" || $country==="England"){
    $language="English";
}elseif ($country==="Spain" || $country==="Argentina" || $country==="Mexico"){
    $language="Spanish";
}
echo $language;
?>