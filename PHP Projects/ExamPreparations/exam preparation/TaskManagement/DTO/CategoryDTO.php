<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 8.11.2018 г.
 * Time: 20:14 ч.
 */

namespace TaskManagement\DTO;
use Exception;

class CategoryDTO
{
    /**
     * @var integer
     */
    private $catId;

    /**
     * @var string
     */
    private $name;

    /**
     * @return int
     */
    public function getCatId(): int
    {
        return $this->catId;
    }

    /**
     * @param int $catId
     */
    public function setCatId(int $catId): void
    {
        $this->catId = $catId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @throws Exception
     */
    public function setName(string $name): void
    {
        if(strlen($name)<3){
            throw new Exception('Name too short!');
        }
        if(strlen($name)>50){
            throw new Exception('Name too long!');
        }
        $this->name = $name;
    }

}