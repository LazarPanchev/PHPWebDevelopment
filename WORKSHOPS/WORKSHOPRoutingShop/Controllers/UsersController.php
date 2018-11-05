<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 28.10.2018 г.
 * Time: 14:10 ч.
 */

namespace Controllers;


use Models\Users;
use Exception;

class UsersController extends BaseController
{

    /**
     * BaseController constructor.
     * @param $db_connection
     * @param string $controllerName
     */
    public function __construct($db_connection, string $controllerName)
    {
        parent::__construct($db_connection, $controllerName);
        $this->model = new Users($this->db_connection);
    }

    /**
     * @throws \Exception
     */
    public function register()
    {
        if ($_POST) {
            try{
                $this->model->save($_POST);
            }catch (Exception $e){
                echo $e->getMessage();
            }
            $this->redirect('/');
        } else {
            $this->renderView(__FUNCTION__);
        }
    }

    public function login($param){
        if($param=='notLogin'){
            echo "User name or Password don't match! Please try again!";
        }
        if($_POST){                                         //we have submit button pressed
            $userId=$this->model->checkUser($_POST);
            if($userId){                                   //username and pass match
                $_SESSION['user_id'] = $userId;            //if we have we set it in the session
                $this->redirect('/');
            }

            $this->redirect('/users/login/notLogin');
        }

        $this->renderView(__FUNCTION__);
    }

    public function logout(){
        session_destroy();
        $this->redirect('/');
    }

    public function checkSession()
    {
        return true;
    }
}