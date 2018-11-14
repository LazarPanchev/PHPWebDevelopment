<?php

namespace TaskManagement\DTO;

use Exception;

class userDTO
{
    const MAX_FIELD_LENGTH = 255;

    const USERNAME_MIN_LENGTH = 3;
    const PASSWORD_MIN_LENGTH = 6;
    const FIRST_NAME_MIN_LENGTH = 3;
    const LAST_NAME_MIN_LENGTH = 3;

    /**
     * @var int
     */
    private $userId;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @throws Exception
     */
    public function setUsername(string $username): void
    {
        if(strlen($username)<self::USERNAME_MIN_LENGTH){
            throw new Exception('Username is too short!');
        }

        if(strlen($username)>self::MAX_FIELD_LENGTH){
            throw new Exception('Username is too long!');
        }
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @throws Exception
     */
    public function setPassword(string $password): void
    {
        if(strlen($password)<self::PASSWORD_MIN_LENGTH){
            throw new Exception('Password is too short!');
        }

        if(strlen($password)>self::MAX_FIELD_LENGTH){
            throw new Exception('Password is too long!');
        }
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @throws Exception
     */
    public function setFirstName(string $firstName): void
    {
        if(strlen($firstName)<self::FIRST_NAME_MIN_LENGTH){
            throw new Exception('First name is too short!');
        }

        if(strlen($firstName)>self::MAX_FIELD_LENGTH){
            throw new Exception('First name is too long!');
        }
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @throws Exception
     */
    public function setLastName(string $lastName): void
    {
        if(strlen($lastName)<self::LAST_NAME_MIN_LENGTH){
            throw new Exception('Last name is too short!');
        }

        if(strlen($lastName)>self::MAX_FIELD_LENGTH){
            throw new Exception('Last name is too long!');
        }
        $this->lastName = $lastName;
    }
}