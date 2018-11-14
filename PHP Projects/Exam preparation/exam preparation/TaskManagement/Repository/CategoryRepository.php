<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 8.11.2018 г.
 * Time: 23:33 ч.
 */

namespace TaskManagement\Repository;


use Database\DatabaseInterface;
use Database\PDODatabase;
use TaskManagement\DTO\CategoryDTO;

class CategoryRepository implements CategoryRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $pdoDatabase;

    /**
     * CategoryRepository constructor.
     * @param DatabaseInterface $pdoDatabase
     */
    public function __construct(DatabaseInterface $pdoDatabase)
    {
        $this->pdoDatabase = $pdoDatabase;
    }


    /**
     * @return \Generator|CategoryDTO[]
     */
    public function findAll(): \Generator
    {
        return $this->pdoDatabase->query('SELECT cat_id AS catId, name
                                         FROM categories')
            ->execute()
            ->fetchAll(CategoryDTO::class);
    }

    /**
     * @param int $id
     * @return CategoryDTO|null
     */
    public function findOne(int $id): ?CategoryDTO
    {
        return $this->pdoDatabase->query("SELECT cat_id AS catId, name 
                                         FROM categories
                                         WHERE cat_id=:id")
            ->execute([":id"=>$id])
            ->fetchAll(CategoryDTO::class)
            ->current();

    }
}