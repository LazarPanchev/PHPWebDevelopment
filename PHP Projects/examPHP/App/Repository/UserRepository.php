<?php

namespace App\Repository;


use App\DTO\UserDTO;
use Database\PDODatabase;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @var PDODatabase
     */
    private $db;

    public function __construct(PDODatabase $db)
    {
        $this->db=$db;
    }

    public function insert(UserDTO $user): bool
    {
        $this->db->query("INSERT INTO users
                              (username,password,full_name, born_on)
                              VALUES(:username,:password,:fullName,:bornOn);")
            ->execute([
                ':username'=>$user->getUsername(),
                ':password'=>$user->getPassword(),
                ':fullName'=>$user->getFullName(),
                ':bornOn'=>$user->getBornOn()
                ]);
        return true;
    }

    public function findByUsername(string $username): ?UserDTO
    {
        return $this->db->query("SELECT user_id AS userId,
                                      username, 
                                      password,
                                      full_name AS fullName,
                                      born_on AS bornOn
                                      FROM users
                                      WHERE username=:username;")
            ->execute([':username'=>$username])
            ->fetch(UserDTO::class)
            ->current();
    }

    public function findById(int $id): ?UserDTO
    {
        return $this->db->query("SELECT user_id AS userId,
                                      username, 
                                      password,
                                      full_name AS fullName,
                                      born_on AS bornOn
                                      FROM users
                                      WHERE user_id=:id;")
            ->execute([':id'=>$id])
            ->fetch(UserDTO::class)
            ->current();
    }

}