<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 8.11.2018 г.
 * Time: 20:48 ч.
 */

namespace TaskManagement\Http;


use Exception;
use TaskManagement\DTO\UserDTO;
use TaskManagement\Service\UserServiceInterface;

class UserHttpHandler extends HttpHandlerAbstract
{
    public function register(UserServiceInterface $userService, $formData=null){
        if(isset($formData['register'])){
            $this->handleRegisterProcess($userService,$formData);
        }else{
            $this->render('users/register');
        }
    }

    public function login(UserServiceInterface $userService, $formData=null ){
        if(isset($formData['login'])){
            $this->handleLoginProcess($userService, $formData);
        }else{
            $this->render('users/login');
        }
    }


    public function logout(){
        session_start();
        session_destroy();
        $this->redirect('index.php');
    }

    private function handleRegisterProcess(UserServiceInterface $userService,$formData){
        try{
            $user=$this->dataBinder->bind($formData,UserDTO::class);
            $userService->register($user,$formData['confirmPassword']);
            $this->render('users/success',$user);
        }catch (Exception $ex){
            $user = $this->dataBinderError->bind($formData, UserDTO::class);
            $this->render('users/register',$user, [$ex->getMessage()]);
        }
    }

    private function handleLoginProcess(UserServiceInterface $userService, $formData)
    {
        try{
            $username=$formData['username'];
            $password=$formData['password'];
            $user=$userService->login($username,$password);

            $_SESSION['id']=$user->getUserId();
            $this->redirect('dashboard.php');
        }catch (Exception $ex){
            $user = $this->dataBinderError->bind($formData, UserDTO::class);
            $this->render("users/login",$user, [$ex->getMessage()]);
       }
    }
}