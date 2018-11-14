<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 9.11.2018 г.
 * Time: 8:34
 */

namespace TaskManagement\Http;


use TaskManagement\DTO\EditDTO;
use TaskManagement\DTO\TaskDTO;
use TaskManagement\Service\CategoryService;
use TaskManagement\Service\CategoryServiceInterface;
use TaskManagement\Service\TaskService;
use TaskManagement\Service\TaskServiceInterface;
use TaskManagement\Service\UserService;
use TaskManagement\Service\UserServiceInterface;
use Exception;

class TaskHttpHandler extends HttpHandlerAbstract
{
    /**
     * @param TaskServiceInterface $taskService
     * @param UserServiceInterface $userService
     * @param CategoryServiceInterface $categoryService
     * @param array $formData
     */
    public function add(TaskServiceInterface $taskService,
                        UserServiceInterface $userService,
                        CategoryServiceInterface $categoryService,
                        array $formData = [])
    {
        if (isset($formData['save'])) {
            if(!isset($_SESSION['id'])){
                $this->redirect('login.php');
            }
            $this->handleInsertProcess($taskService, $userService, $categoryService, $formData);
        } else {
            if(!isset($_SESSION['id'])){
                $this->redirect('login.php');
            }
            /** @var EditDTO $taskDTO */
            $task = $this->dataBinder->bind($formData, TaskDTO::class);
            $editDTO = new EditDTO();
            $editDTO->setTask($task);
            $editDTO->setCategories($categoryService->getAll());
                      //empty editDTO with only categories for first visualization the add view

            $this->render("tasks/add", $editDTO);
        }

    }

    public function edit(TaskServiceInterface $taskService,
                         UserServiceInterface $userService,
                         CategoryServiceInterface $categoryService,
                         array $formData = [], array $getData = [])
    {
        if (isset($formData['save'])) {
            if(!isset($_SESSION['id'])){
                $this->redirect('login.php');
            }
            $this->handleEditProcess($taskService, $userService, $categoryService, $formData, $getData);
        } else {
            if(!isset($_SESSION['id'])){
                $this->redirect('login.php');
            }
            $task = $taskService->getOne(intval($getData['id']));

            $editDTO = new EditDTO();
            $editDTO->setTask($task);
            $editDTO->setCategories($categoryService->getAll());
            $this->render("tasks/edit", $editDTO);
        }
    }

    public function delete(TaskServiceInterface $taskService, array $getData = [])
    {
        if (!isset($getData['id'])) {
            $this->redirect("dashboard.php");
        }
        $taskService->delete(intval($getData['id']));
        $this->redirect("dashboard.php");
    }

    /**
     * @param $taskService
     * @param $userService
     * @param $categoryService
     * @param $formData
     */
    private function handleInsertProcess(TaskServiceInterface $taskService,
                                         UserServiceInterface $userService,
                                         CategoryServiceInterface $categoryService,
                                         array $formData = [])
    {
        try {
            /** @var TaskDTO $task */
            $task = $this->dataBinder->bind($formData, TaskDTO::class);

            $author = $userService->currentUser();
            $category = $categoryService->getOne(intval($formData['categoryId']));

            $task->setAuthor($author);
            $task->setCategory($category);
            $taskService->add($task);

            $this->redirect("dashboard.php");
        } catch (Exception $ex) {   //if error make task from the form, all categories and send it with the errors
            $task = $this->dataBinderError->bind($formData, TaskDTO::class);
            $editDTO = new EditDTO();
            $editDTO->setTask($task);
            $editDTO->setCategories($categoryService->getAll());   //categories are generator
            $this->render('tasks/add', $editDTO, [$ex->getMessage()]);
        }

    }

    /**
     * @param TaskServiceInterface $taskService
     * @param UserServiceInterface $userService
     * @param CategoryServiceInterface $categoryService
     * @param array $formData
     * @param array $getData
     */
    private function handleEditProcess(TaskServiceInterface $taskService,
                                       UserServiceInterface $userService,
                                       CategoryServiceInterface $categoryService,
                                       array $formData = [], array $getData = [])
    {
        try {
            /** @var TaskDTO $task */
            $task = $this->dataBinder->bind($formData, TaskDTO::class);

            $author = $userService->currentUser();
            $category = $categoryService->getOne(intval($formData['categoryId']));
            $task->setAuthor($author);
            $task->setCategory($category);
            $task->setTaskId($getData['id']);

            $taskService->edit($task, intval($getData['id']));
            $this->redirect("dashboard.php");  // or redirect to editTask.php but the id in get request will be missing
        } catch (Exception $ex) {
//            $task=$this->dataBinderError->bind($formData,TaskDTO::class);
//            $category=$categoryService->getOne($formData['categoryId']);
//            $task->setCategory($category);
            $task = $taskService->getOne(intval($getData['id']));
            $editDTO = new EditDTO();
            $editDTO->setTask($task);
            $editDTO->setCategories($categoryService->getAll());
            $this->render('tasks/edit', $editDTO, [$ex->getMessage()]);
        }
    }
}