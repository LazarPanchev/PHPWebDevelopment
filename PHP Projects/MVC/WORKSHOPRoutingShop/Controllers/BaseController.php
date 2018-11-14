<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 28.10.2018 г.
 * Time: 14:11 ч.
 */

namespace Controllers;


use Database\PDODatabase;

class BaseController
{

    /**
     * @var PDODatabase
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
    public function __construct(PDODatabase $db_connection, string $controllerName)
    {
        $this->db_connection = $db_connection;
        $this->controllerName=$controllerName;

        if(!$this->checkSession()){
            $this->redirect('/users/login');
        }
    }

    protected function renderView(string $viewName, $data=null){
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

    protected function redirect(string $url){
        header('Location: ' . APP_ROOT . $url);
        exit;
    }
}