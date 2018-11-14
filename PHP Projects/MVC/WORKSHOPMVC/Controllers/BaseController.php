<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 28.10.2018 г.
 * Time: 14:11 ч.
 */

namespace Controllers;


use Database\PDODatabase;
use Core\View;

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
     * @var View
     */
    protected $view;

    /**
     * BaseController constructor.
     * @param PDODatabase $db_connection
     * @param View $view
     */
    public function __construct(PDODatabase $db_connection, View $view)
    {
        $this->db_connection = $db_connection;
        $this->view=$view;

        if(!$this->checkSession()){
            $this->redirect('/users/login');
        }
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