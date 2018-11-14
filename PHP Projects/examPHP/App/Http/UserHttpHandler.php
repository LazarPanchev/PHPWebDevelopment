<?php

namespace App\Http;
use App\DTO\UserDTO;
use App\Service\UserServiceInterface;
use Exception;

class UserHttpHandler extends HttpHandlerAbstract
{
    public function index(){
        $this->render('home/index');
    }
    /**
     * @param UserServiceInterface $userService
     * @param array $formData
     */
    public function register(UserServiceInterface $userService,array $formData=[]){
        if(isset($formData['Register'])){
            $this->handleRegisterProcess($userService,$formData);
        }else{
            $this->render('users/register');
        }
    }

    public function login(UserServiceInterface $userService, array $formData=[]){
        if(isset($formData['Login'])){
            $this->handleLoginProcess($userService,$formData);
        }else{
            $successMessage=null;
            if(isset($_SESSION['success'])){
                $successMessage=$_SESSION['success'];
            }
            $this->render('users/login',null,[],$successMessage);
            if (isset($_SESSION['success'])){
                unset($_SESSION['success']);
            }
        }
    }

    public function profile(UserServiceInterface $userService){
        if(isset($_SESSION['id'])){
            $this->handleProfileProcess($userService);
        }else{
            $this->redirect('login.php');
        }

    }

    public function logout(){
        session_start();
        session_destroy();
        $this->redirect('login.php');
    }

    /**
     * @param UserServiceInterface $userService
     * @param array $formData
     */
    private function handleRegisterProcess(
        UserServiceInterface $userService,array $formData=[])
    {
        try{
            /** @var UserDTO $user */
            $user=$this->dataBinder->bind($formData,UserDTO::class);
            $confirmPassword=$formData['confirm_password'];
            $userService->register($user,$confirmPassword);
            $_SESSION['success']="Congratulations, " . $user->getFullName() . ". Login in our platform";
            $this->redirect('login.php');
        }catch (Exception $ex){
            $user=$this->dataBinder->bindReflection($formData,UserDTO::class);
            $this->render('users/register',$user,[$ex->getMessage()]);
        }

    }

    private function handleLoginProcess(UserServiceInterface $userService, array $formData=[])
    {
        try{
            $user=$userService->login($formData['username'],$formData['password']);
            $_SESSION['id']=$user->getUserId();
            $this->redirect('profile.php');
        }catch (Exception $ex){
            $user=$this->dataBinder->bindReflection($formData,UserDTO::class);
            $this->render('users/login',$user,[$ex->getMessage()]);
        }
    }

    private function handleProfileProcess(UserServiceInterface $userService)
    {
        try{
            $user=$userService->getCurrentUser();
            $this->render('users/profile', [$user]);
        }catch (Exception $ex){
            $this->redirect('login.php');
        }
    }
}