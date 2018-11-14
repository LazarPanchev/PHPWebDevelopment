<?php

namespace App\Http;

use App\Data\ErrorDTO;
use App\Data\UserDTO;
use App\Service\UserServiceInterface;

class HttpHandler extends HttpHandlerAbstract
{
    public function index(){
        $this->render("home/index");
    }
    public function register(UserServiceInterface $userService, array $formData = [])
    {
        if (isset($formData['register'])) {
            $this->handleRegisterProcess($userService, $formData);
        } else {
            $this->render("users/register");
        }
    }

    public function login(UserServiceInterface $userService, array $formData = [])
    {
        if (isset($formData['login'])) {
            $this->handleLoginProcess($userService, $formData);
        } else {
            $this->render('users/login');
        }

    }

    public function profile(UserServiceInterface $userService, array $formData = [])
    {
        $currentUser = $userService->currentUser();

        if (is_null($currentUser)) {
            $this->redirect('login.php');
        }

        if (isset($formData['edit'])) {
            $this->handleEditProcess($userService, $formData);
        } else {
            $this->render('users/profile', $currentUser);
        }
    }

    public function allUsers(UserServiceInterface $userService)
    {
        $allUsers = $userService->all();
        $this->render("users/all", $allUsers);
    }

    /**
     * @param UserServiceInterface $userService
     * @param array $formData
     */
    private function handleRegisterProcess(UserServiceInterface $userService, array $formData): void
    {

        //Without binder
//        $user = UserDTO::create(
//            $formData['username'],
//            $formData['password'],
//            $formData['first_name'],
//            $formData['last_name'],
//            $formData['born_on']
//        );
        $user = $this->dataBinder->bind($formData,UserDTO::class);

        if ($userService->register($user, $formData['confirm_password'])) {
            $this->redirect("login.php");
        }else {
            $this->render("app/error",
                new ErrorDTO("Username is already taken or password mismatch!"));
        }
    }

    private function handleLoginProcess(UserServiceInterface $userService, array $formData): void
    {
        $currentUser = $userService->login($formData['username'], $formData['password']);

        if ($currentUser !== null) {
            $_SESSION['id'] = $currentUser->getId();
            $this->redirect("profile.php");
        } else {
            $this->render("app/error",
                new ErrorDTO("Username does not exist or password mismatch!"));
        }

    }

    private function handleEditProcess(UserServiceInterface $userService, array $formData): void
    {
//        $user = UserDTO::create(
//            $formData['username'],
//            $formData['password'],
//            $formData['first_name'],
//            $formData['last_name'],
//            $formData['born_on']
//        );
        $user = $this->dataBinder->bind($formData,UserDTO::class);

        if ($userService->edit($user)) {
            $this->redirect('profile.php');
        } else {
         $this->render("app/error", new ErrorDTO("Error editing profile!"));
        }
//        try {
//            $userService->edit($user);
//            $this->redirect('profile.php');
//        }catch (\PDOException $e){
//            $this->render("app/error", new ErrorDTO("Error editing profile!"));
//        }
    }

}