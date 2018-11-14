<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 8.11.2018 г.
 * Time: 22:39 ч.
 */

namespace TaskManagement\Http;

use TaskManagement\Service\TaskServiceInterface;
use TaskManagement\Service\UserServiceInterface;

class HomeHttpHandler extends HttpHandlerAbstract
{


    public function index(UserServiceInterface $userService)
    {
        if($userService->isLogged()){
            $this->redirect("dashboard.php");
        }else{
            $this->render("home/index");
        }
    }

    public function dashboard(TaskServiceInterface $taskService){
        if(!isset($_SESSION['id'])){
            $this->redirect("login.php");
        }

        $allTasks = $taskService->getAll();
        $this->render("tasks/all", $allTasks);

    }

}