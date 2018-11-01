<?php



use Database\PDODatabase;
use Core\View;

spl_autoload_register();
session_start();

$url=$_SERVER['REQUEST_URI'];

$url_data= explode('/',$url);
array_shift($url_data);
$firstRoot= array_shift($url_data);
$secondRoot = array_shift($url_data);

define('APP_ROOT','/' . $firstRoot . '/' . $secondRoot );  ///PHPExercise/WORKSHOPRoutingShop
$controller=null;

if(isset($url_data[0]) && $url_data[0]!=''){    //$controller=$url_data[0]??'index'?:'products';
    $controller=$url_data[0];
}else{
    $controller='products';
}

$action=$url_data[1]??'index';
//print_r($url_data);
$param=$url_data[2]??null;

$config=parse_ini_file('Config/db.ini');

$pdo=new PDO($config['dsn'],$config['user'],$config['pass'],[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
$db=new PDODatabase($pdo);

$controllerName=ucfirst($controller);
$controller='Controllers\\' . ucfirst($controller) . 'Controller';

if(!class_exists($controller)){
    throw new Exception('Non valid controller!' . $controller) ;
}
$view = new View($controllerName,$action);

$controller_obj= new $controller($db,$view);    //controller

$controller_obj->$action($param);      //action



