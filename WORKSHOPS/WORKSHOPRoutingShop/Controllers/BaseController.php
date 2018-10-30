<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 28.10.2018 г.
 * Time: 14:11 ч.
 */

namespace Controllers;


class BaseController
{

    /**
     * @var
     */
    protected $db_connection;

    /**
     * @var Products
     */
    protected $model;

    /**
     * @var string
     */
    protected $controllerName;

    /**
     * BaseController constructor.
     * @param $db_connection
     * @param string $controllerName
     */
    public function __construct($db_connection, string $controllerName)
    {
        $this->db_connection = $db_connection;
        $this->controllerName=$controllerName;

        if(!$this->checkSession()){
            header('Location: /PHPExercise/WORKSHOPRoutingShop/users/login');
            exit;
        }
    }

    protected function renderView(string $viewName, array $data=null){
        include('Views/header.html');
        include('Views/' . $viewName . '.php');
        include('Views/footer.html');
    }

    protected function checkSession(){
        if(!$_SESSION['user_id']){
            return null;
        }
        return $_SESSION['user_id'];  //true
    }
}