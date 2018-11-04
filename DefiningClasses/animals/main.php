<?php
spl_autoload_register();

//$typeAnimal = ['Frog','Beast!'];
//$line = ['Sashky -12 Male'];

//for ($i = 0; $i < count($typeAnimal); $i++) {
//    if ($typeAnimal[$i] == 'Beast!') {
//        break;
//    }
//
//    $tokens = explode(' ', $line[$i]);
//    $name = $tokens[0];
//    $age = intval($tokens[1]);
//    $gender = $tokens[2];
//$typeAnimal=readline()
$typeAnimal=readline();

    while ($typeAnimal != 'Beast!') {

    $tokens = array_filter(explode(' ', readline()));
    $name = $tokens[0];
    $age = intval($tokens[1]);
    $gender = $tokens[2];


    try {
        if (!class_exists($typeAnimal)) {
            throw new Exception('Invalid input!');
        }
        $animal = new $typeAnimal($name, $age, $gender);
    } catch (Exception $e) {
        echo $e->getMessage();
        exit;
    }

    echo $animal;


    $typeAnimal=readline();

}


?>