<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 21.10.2018 г.
 * Time: 20:15 ч.
 */

abstract class Character
{
    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $hashedPassword;

    /**
     * @var int
     */
    protected $level;

    public function __construct(string $username, int $level)
    {
            $this->setUsername($username);
            $this->setLevel($level);
    }

    private function setUsername(string $username):void{
        $this->username=$username;
    }

    protected function getUsername():string{
        return $this->username;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @param int $level
     */
    private function setLevel(int $level): void
    {
        $this->level = $level;
    }

    /**
     * @return string
     */
    public function getHashedPassword(): string
    {
        return $this->hashedPassword;
    }

    /**
     * @param string $hashedPassword
     */
    protected function setHashedPassword(string $hashedPassword): void
    {
        $this->hashedPassword = $hashedPassword;
    }

    public abstract function __toString();

}