<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 6.11.2018 г.
 * Time: 9:53
 */

namespace App\Http;

use App\Data\ErrorDTO;
use App\Data\UserDTO;
use App\Service\UserServiceInterface;

class HttpHandler extends HttpHandlerAbstract
{
    public function index()
    {
        $this->render("home/index");
    }

    public function register(UserServiceInterface $userService,array  $formData=[])
    {
        if (isset($formData['register'])) {
            $this->handleRegisterProcess($userService, $formData);
        } else {
            $this->render('users/register');
        }
    }

    public function login(UserServiceInterface $userService,array $formData=[])
    {
        if (isset($formData['login'])) {
            $this->handleLoginProcess($userService, $formData);
        } else {
            $this->render('users/login');
        }
    }

    public function profile(UserServiceInterface $userService, $formData){
        if(!isset($_SESSION['id'])){
            $this->redirect('login.php');
        }
        $currentUser=$userService->currentUser();

        if(is_null($currentUser)){
            $this->render('app/error', new ErrorDTO('First you have to login to edit your profile!'));
        }else{
            if(isset($formData['edit'])){
                $this->handleEditProcess($userService, $formData);
            }else{
                $this->render('users/profile',$currentUser);
            }
        }
    }

    public function logout(){
        if(isset($_SESSION['id'])){
            session_destroy();
        }

        $this->redirect('index.php');
    }

    public function allUsers(UserServiceInterface $userService){
        if(isset($_SESSION['id'])){
            $users=$userService->all();
            $this->render('users/all',$users);
        }else{
            $this->render("app/error", new ErrorDTO('Some error.'));
        }
    }

    private function handleRegisterProcess(UserServiceInterface $userService, $formData)
    {
        $user =$this->dataBinder->bind($formData,UserDTO::class);

        $confirmPassword = $formData['confirm_password'];
        if ($userService->register($user, $confirmPassword)) {
            $this->redirect("login.php");
        } else {
            $this->render("app/error",
                new ErrorDTO('Username exist or password mismatch!'));
        }
    }

    private function handleLoginProcess(UserServiceInterface $userService, $formData)
    {
        $userName = $formData['username'];
        $password = $formData['password'];

        $currentUser = $userService->login($userName, $password);
        if ($currentUser) {
            $_SESSION['id'] = $currentUser->getId();
            $this->redirect('profile.php');
        } else {
            $this->render("app/error",
                new ErrorDTO('Wrong password or not existing user!'));
        }
    }

    private function handleEditProcess(UserServiceInterface $userService, $formData)
    {
        $currentUser=$this->dataBinder->bind($formData,UserDTO::class);

        if($userService->edit($currentUser)){
            $this->redirect('profile.php');
        }else{
            $this->render("app/error",
                new ErrorDTO('This username is busy! Try with another one.'));
        }

    }
}