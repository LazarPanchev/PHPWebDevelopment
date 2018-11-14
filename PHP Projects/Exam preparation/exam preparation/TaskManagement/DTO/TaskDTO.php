<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 8.11.2018 г.
 * Time: 20:04 ч.
 */

namespace TaskManagement\DTO;
use DateTime;
use Exception;

class TaskDTO
{
    const TITLE_MIN_LENGTH = 3;
    const TITLE_MAX_LENGTH = 50;

    const DESCRIPTION_MIN_LENGTH = 10;
    const DESCRIPTION_MAX_LENGTH = 10000;

    const LOCATION_MIN_LENGTH = 3;
    const LOCATION_MAX_LENGTH = 100;
    /**
     * @var int
     */
    private $taskId;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $location;

    /**
     * @var UserDTO
     */
    private $author;

    /**
     * @var CategoryDTO
     */
    private $category;

    /**
     * @var string|null
     */
    private $startedOn;

    /**
     * @var string|null
     */
    private $dueDate;

    /**
     * @return int
     */
    public function getTaskId(): int
    {
        return $this->taskId;
    }

    /**
     * @param int $taskId
     */
    public function setTaskId(int $taskId): void
    {
        $this->taskId = $taskId;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @throws Exception
     */
    public function setTitle(string $title): void
    {
        if(strlen($title)<self::TITLE_MIN_LENGTH){
            throw new Exception('Title too short!');
        }
        if(strlen($title)>self::TITLE_MAX_LENGTH){
            throw new Exception('Title too long!');
        }
        $this->title = $title;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @throws Exception
     */
    public function setDescription(string $description): void
    {
        if(strlen($description)<self::DESCRIPTION_MIN_LENGTH){
            throw new Exception('Description too short!');
        }
        if(strlen($description)>self::DESCRIPTION_MAX_LENGTH){
            throw new Exception('Description too long!');
        }
        $this->description = $description;
    }

    /**
     * @return string|null
     */
    public function getLocation(): ?string
    {
        return $this->location;
    }

    /**
     * @param string $location
     * @throws Exception
     */
    public function setLocation(string $location): void
    {
        if(strlen($location)<self::LOCATION_MIN_LENGTH){
            throw new Exception('Location too short!');
        }
        if(strlen($location)>self::LOCATION_MAX_LENGTH){
            throw new Exception('Location too long!');
        }
        $this->location = $location;
    }

    /**
     * @return UserDTO
     */
    public function getAuthor(): UserDTO
    {
        return $this->author;
    }

    /**
     * @param UserDTO $author
     */
    public function setAuthor(UserDTO $author): void
    {
        $this->author = $author;
    }

    /**
     * @return CategoryDTO
     */
    public function getCategory(): CategoryDTO
    {
        return $this->category;
    }

    /**
     * @param CategoryDTO $category
     */
    public function setCategory(CategoryDTO $category): void
    {
        $this->category = $category;
    }


    /**
     * @return string|null
     */
    public function getStartedOn(): ?string
    {
        return $this->startedOn;
    }

    /**
     * @param string $startedOn
     */
    public function setStartedOn(?string $startedOn): void
    {
        $this->startedOn = $startedOn;
    }

    /**
     * @return string|null
     */
    public function getDueDate(): ?string
    {
        return $this->dueDate;
    }

    /**
     * @param string $dueDate
     */
    public function setDueDate(?string $dueDate): void
    {
        $this->dueDate = $dueDate;
    }
}