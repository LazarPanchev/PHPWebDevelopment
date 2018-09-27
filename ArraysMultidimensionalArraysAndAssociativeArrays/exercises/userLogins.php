<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 27.9.2018 г.
 * Time: 14:32
 */

$input = readline();
$map = [];
while ($input !== 'login') {
    $tokens = explode(' -> ', $input);
    $username = $tokens[0];
    $password = $tokens[1];
    $map[$username] = $password;

    $input = readline();
}
$input = readline();
$failedLogins=0;
while ($input !== 'end') {
    $tokens = explode(' -> ', $input);
    $username = $tokens[0];
    $password = $tokens[1];

    if((!array_key_exists($username,$map) || ($map[$username]!==$password))){
        $failedLogins++;
        echo "$username: login failed" . PHP_EOL;
    }else{
        echo "$username: logged in successfully" . PHP_EOL;
    }
    $input = readline();
}
echo "unsuccessful login attempts: $failedLogins";

?>