<?php

namespace App\Data;

class UserDTO
{
    /**
     * @var int
     */
    private $id;
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
     * @var string
     */
    private $bornOn;

    public static function create(string $username, string $password,
                                  string $firstName, string $lastName, string $bornOn,?int $id=null){
        return (new UserDTO())
            ->setUsername($username)
            ->setPassword($password)
            ->setFirstName($firstName)
            ->setLastName($lastName)
            ->setBornOn($bornOn)
            ->setId($id);
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function setId(?int $id): UserDTO
    {
        $this->id = $id;
        return $this;
    }
    public function getUsername(): string
    {
        return $this->username;
    }
    public function setUsername(string $username): UserDTO
    {
        $this->username = $username;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
    public function setPassword(string $password): UserDTO
    {
        $this->password = $password;
        return $this;
    }
    public function getFirstName(): string
    {
        return $this->firstName;
    }
    public function setFirstName(string $firstName): UserDTO
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): UserDTO
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getBornOn():string
    {
        return $this->bornOn;
    }

    public function setBornOn(string $bornOn): UserDTO
    {
        $this->bornOn = $bornOn;
        return $this;
    }

}