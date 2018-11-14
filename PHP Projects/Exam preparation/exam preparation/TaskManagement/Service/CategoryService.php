<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 9.11.2018 г.
 * Time: 7:51
 */

namespace TaskManagement\Service;


use Exception;
use TaskManagement\DTO\CategoryDTO;
use TaskManagement\Repository\CategoryRepositoryInterface;

class CategoryService implements CategoryServiceInterface
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;

    /**
     * CategoryService constructor.
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return \Generator|CategoryDTO[]
     */

    public function getAll(): \Generator
    {
        return $this->categoryRepository->findAll();
    }

    /**
     * @param int $id
     * @return CategoryDTO
     * @throws Exception
     */
    public function getOne(int $id): CategoryDTO
    {
        $category= $this->categoryRepository->findOne($id);
        if($category===null){
            throw new Exception("Category not found!");
        }

        return $category;
    }
}