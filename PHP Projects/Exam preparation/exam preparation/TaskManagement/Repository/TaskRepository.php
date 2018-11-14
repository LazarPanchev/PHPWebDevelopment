<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 8.11.2018 г.
 * Time: 23:48 ч.
 */

namespace TaskManagement\Repository;

use Core\DataBinderInterface;
use Database\DatabaseInterface;
use TaskManagement\DTO\CategoryDTO;
use TaskManagement\DTO\TaskDTO;
use TaskManagement\DTO\userDTO;

class TaskRepository implements TaskRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $pdoDatabase;
    /**
     * @var DataBinderInterface
     */
    private $dataBinder;

    /**
     * CategoryRepository constructor.
     * @param DatabaseInterface $pdoDatabase
     * @param DataBinderInterface $dataBinder
     */
    public function __construct(DatabaseInterface $pdoDatabase, DataBinderInterface $dataBinder)
    {
        $this->pdoDatabase = $pdoDatabase;
        $this->dataBinder=$dataBinder;
    }

    public function findAll(): \Generator
    {
        $lazyTaskResult = $this->pdoDatabase->query("
              SELECT t.task_id AS taskId, 
                t.title,
                t.description,
                t.location,
                u.user_id AS userId,
                u.username,
                c.cat_id AS catId,
                c.name AS name
                FROM tasks AS t 
                INNER JOIN users AS u
                ON t.user_id = u.user_id
                INNER JOIN categories AS c 
                ON t.cat_id = c.cat_id
                ORDER BY t.due_date DESC, t.task_id ASC")
            ->execute()
            ->fetchAll();
        foreach ($lazyTaskResult as $row) {   //row is object with everything
            /** @var TaskDTO $task */
            $task = $this->dataBinder->bind($row, TaskDTO::class);
            /** @var UserDTO $author */
            $author = $this->dataBinder->bind($row, UserDTO::class);
            /** @var CategoryDTO $category */
            $category = $this->dataBinder->bind($row, CategoryDTO::class);
//
//            $task->setTaskId($row['taskId']);
//            $author->setUserId($row['userId']);
//            $category->setCatId($row['catId']);

            $task->setAuthor($author);
            $task->setCategory($category);

            yield $task;
        }

    }

    public function findOne(int $id): TaskDTO
    {
        $row = $this->pdoDatabase->query("
              SELECT t.task_id AS taskId, 
                t.title,
                t.description,
                t.location,
                u.user_id AS userId,
                u.username,
                c.cat_id AS catId,
                c.name AS name,
                started_on AS startedOn,
                due_date AS dueDate
                FROM tasks AS t 
                INNER JOIN users AS u
                ON t.user_id = u.user_id
                INNER JOIN categories AS c 
                ON t.cat_id = c.cat_id
                WHERE t.task_id = :id
                ORDER BY t.due_date DESC, t.task_id ASC")
            ->execute([':id'=>$id])
            ->fetchAll()->current();
        /** @var TaskDTO $task */
        $task = $this->dataBinder->bind($row, TaskDTO::class);
        /** @var UserDTO $author */
        $author = $this->dataBinder->bind($row, UserDTO::class);
        /** @var CategoryDTO $category */
        $category = $this->dataBinder->bind($row, CategoryDTO::class);

//        $task->setTaskId($row['taskId']);
//        $author->setUserId($row['userId']);
//        $category->setCatId($row['catId']);

        $task->setAuthor($author);
        $task->setCategory($category);

        return $task;
    }

    public function insert(TaskDTO $taskDTO): bool
    {
        $this->pdoDatabase->query("
              INSERT INTO tasks(title, description, location, user_id, cat_id, started_on, due_date) 
              VALUES(:title, :description, :location, :userId, :categoryId, :startedOn, :dueDate)")
            ->execute([':title' => $taskDTO->getTitle(),
                ':description' => $taskDTO->getDescription(),
                ':location' => $taskDTO->getLocation(),
                ':userId' => $taskDTO->getAuthor()->getUserId(),
                ':categoryId' => $taskDTO->getCategory()->getCatId(),
                ':startedOn' => $taskDTO->getStartedOn(),
                ':dueDate' => $taskDTO->getDueDate()]);
        return true;
    }

    public function update(TaskDTO $taskDTO, int $id): bool
    {
        $this->pdoDatabase->query("
              UPDATE tasks 
              SET title=:title,
               description=:description,
               location =:location,
               user_id =:userId,
               cat_id = :categoryId,
               started_on =:startedOn,
               due_date = :dueDate
               WHERE task_id = :id;")
            ->execute([':title' => $taskDTO->getTitle(),
                ':description' => $taskDTO->getDescription(),
                ':location' => $taskDTO->getLocation(),
                ':userId' => $taskDTO->getAuthor()->getUserId(),
                ':categoryId' => $taskDTO->getCategory()->getCatId(),
                ':startedOn' => $taskDTO->getStartedOn(),
                ':dueDate' => $taskDTO->getDueDate(),
                ':id' => $taskDTO->getTaskId()]);
        return true;
    }

    public function remove(int $id): bool
    {
        $this->pdoDatabase->query("DELETE FROM tasks
                                        WHERE task_id = :id;")
            ->execute([':id' => $id]);
        return true;
    }
}