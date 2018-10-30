<?php



use Db\DBConnection as DbConnection;

spl_autoload_register();
session_start();

$url=$_SERVER['REQUEST_URI'];

$url_data= explode('/',$url);
array_shift($url_data);
array_shift($url_data);
array_shift($url_data);

$controller=null;

if(isset($url_data[0]) && $url_data[0]!=''){    //$controller=$url_data[0]??'index'?:'products';
    $controller=$url_data[0];
}else{
    $controller='products';
}

$action=$url_data[1]??'index';
//print_r($url_data);
$param=$url_data[2]??null;

$db = DBConnection::getConnection();

$controllerName=ucfirst($controller);
$controller='Controllers\\' . ucfirst($controller) . 'Controller';

if(!class_exists($controller)){
    throw new Exception('Non valid controller!' . $controller) ;
}

$controller_obj= new $controller($db,$controllerName);    //controller
$controller_obj->$action($param);      //action



