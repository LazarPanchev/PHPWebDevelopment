<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 27.9.2018 г.
 * Time: 15:47
 */
$mapPosition = [];
$mapSalary = [];
$mapAge = [];
$input = readline();
while ($input !== 'filter base') {
    $tokens = explode(' -> ', $input);
    $name = $tokens[0];
    $secondElement = $tokens[1];
    $isString = true;
    for ($i = 0; $i < strlen($secondElement); $i++) {
        if (is_numeric($secondElement[$i])) {
            $isString = false;
            if (!ctype_alnum($secondElement)) {
                //        echo 'float';
                $mapSalary[$name] = floatval($tokens[1]);

            } else {
                //        echo 'int';
                $mapAge[$name] = intval($tokens[1]);
            }
        }
        break;
    }

    if ($isString) {
        $mapPosition[$name] = $tokens[1];
    }
    $input = readline();
}


$input = readline();
switch ($input) {
    case 'Position':
        foreach ($mapPosition as $key => $value) {
            printf("Name: %s\nPosition: %s\n", $key, $value);
            echo str_repeat('=', 20). PHP_EOL;
        }
        break;
    case 'Salary':
        foreach ($mapSalary as $key => $value) {
            printf("Name: %s\nSalary: %.2f\n", $key, $value);
            echo str_repeat('=', 20). PHP_EOL;
        }
        break;

    case 'Age':
        foreach ($mapAge as $key => $value) {
            printf("Name: %s\nAge: %d\n", $key, $value);
            echo str_repeat('=', 20). PHP_EOL;
        }
        break;
}


?>