<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 8.11.2018 г.
 * Time: 20:40 ч.
 */

namespace TaskManagement\Repository;



use TaskManagement\DTO\TaskDTO;

interface TaskRepositoryInterface
{
    public function findAll() :\Generator;

    public function findOne(int $id): TaskDTO;

    public function insert(TaskDTO $taskDTO) :bool;

    public function update(TaskDTO $taskDTO, int $id) :bool;

    public function remove(int $id) :bool;
}