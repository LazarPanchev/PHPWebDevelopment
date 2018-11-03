<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 3.11.2018 г.
 * Time: 15:03 ч.
 */

namespace App\Http;

use App\Data\UserDTO;
use App\Service\UserServiceInterface;
use App\Data\ErrorDTO;

class HttpHandler extends HttpHandleAbstract
{
    public function index(){
        $this->render('home/index');
    }

    public function register(UserServiceInterface $userService, $formData){
        if(isset($formData['register'])){
           $this->handleRegisterProcess($userService,$formData);
        }else{
            $this->render('users/register');
        }
    }

    public function login(UserServiceInterface $userService, $formData ){
        if(isset($formData['login'])){
            $this->handleLoginProcess($userService, $formData);
        }else{
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

    public function allUsers(UserServiceInterface $userService){
        if(isset($_SESSION['id'])){
            $this->handleAllUsersProcess($userService);
        }else{
            $this->redirect('login.php');
        }
    }

    public function logout(){
        session_destroy();
        $this->render('home/index');
    }

    private function handleRegisterProcess(UserServiceInterface $userService,$formData){
//        $user=UserDTO::createUser(
//            $formData['username'],
//            $formData['password'],
//            $formData['first_name'],
//            $formData['last_name'],
//            $formData['born_on']);
        $user=$this->dataBinder->bind($formData,UserDTO::class);

        if($userService->register($user,$formData['confirm_password'])){
            $this->redirect('login.php');
        }else{
            $this->render('app/error',
                new ErrorDTO('Username already exist or password mismatch!'));
        }
    }

    private function handleLoginProcess(UserServiceInterface $userService, $formData)
    {
        $username=$formData['username'];
        $password=$formData['password'];
        $user=$userService->login($username,$password);
        if($user){
            $_SESSION['id']=$user->getId();
            $this->redirect('profile.php');
        }else{
            $this->render('app/error',
                new ErrorDTO('No such user or wrong password! Please try again!'));
        }
    }

    private function handleEditProcess(UserServiceInterface $userService, $formData)
    {
//        $editedUser=UserDTO::createUser(
//            $formData['username'],
//            $formData['password'],
//            $formData['first_name'],
//            $formData['last_name'],
//            $formData['born_on']);
        $editedUser=$this->dataBinder->bind($formData,UserDTO::class);

        if($userService->edit($editedUser)){
            $this->redirect('profile.php');
        }else{
            $this->render('app/error',
                new ErrorDTO('Some error occurred while editing. Probably the username already exist!'));
        }

    }

    private function handleAllUsersProcess(UserServiceInterface $userService)
    {
        $allUsers=$userService->allUsers();
        if(is_iterable($allUsers)){
            $this->render('users/allUsers', $allUsers);
        }else{
            $this->render('app/error',
                new ErrorDTO('Some error occurred while getting all users!'));
        }

    }


}