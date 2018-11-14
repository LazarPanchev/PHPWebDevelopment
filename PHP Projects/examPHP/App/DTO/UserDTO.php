<?php

namespace App\DTO;

use Exception;

class UserDTO{

    const MIN_USERNAME_LENGTH=4;
    const MIN_PASSWORD_LENGTH=4;
    const MIN_FULLNAME_LENGTH=5;
    const MAX_FIELD_LENGTH=255;


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
    private $fullName;
    /**
     * @var string
     */
    private $bornOn;

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
        DTOValidator::validate(
            self::MIN_USERNAME_LENGTH,
            self::MAX_FIELD_LENGTH,
             $username,
            "Username must be between " .
             self::MIN_USERNAME_LENGTH . " and " .
             self::MAX_FIELD_LENGTH . " characters!");
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
        DTOValidator::validate(self::MIN_PASSWORD_LENGTH,
            self::MAX_FIELD_LENGTH,
            $password,
            "Password must be between " .
            self::MIN_PASSWORD_LENGTH . " and " .
            self::MAX_FIELD_LENGTH);
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->fullName;
    }

    /**
     * @param string $fullName
     * @throws Exception
     */
    public function setFullName(string $fullName): void
    {
        DTOValidator::validate(self::MIN_FULLNAME_LENGTH,
            self::MAX_FIELD_LENGTH,
            $fullName,
            "Full Name must be between " .
            self::MIN_FULLNAME_LENGTH . " and " .
            self::MAX_FIELD_LENGTH . " characters");
        $this->fullName = $fullName;
    }

    /**
     * @return string
     */
    public function getBornOn(): string
    {
        return $this->bornOn;
    }

    /**
     * @param string $bornOn
     * @throws Exception
     */
    public function setBornOn(string $bornOn): void
    {
        DTOValidator::validateDate($bornOn,'Invalid date. Please fill out the date!');
        $this->bornOn = $bornOn;
    }

}