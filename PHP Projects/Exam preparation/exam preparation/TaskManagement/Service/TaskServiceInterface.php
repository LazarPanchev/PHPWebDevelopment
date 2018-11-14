<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 9.11.2018 г.
 * Time: 7:56
 */

namespace TaskManagement\Service;


use TaskManagement\DTO\TaskDTO;

interface TaskServiceInterface
{
    /**
     * @return \Generator|TaskDTO[]
     */
    public function getAll():\Generator;

    public function getOne(int $id) :TaskDTO;

    public function add(TaskDTO $taskDTO):bool;

    public function edit(TaskDTO $taskDTO, int $id):bool;

    public function delete(int $id):bool;


}