<?php

namespace App\Repository;


use App\Data\UserDTO;
use Database\DatabaseInterface;
use Generator;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $database;

    public function __construct(DatabaseInterface $database)
    {
        $this->database=$database;
    }

    public function findOneByUsername(string $username): ?UserDTO
    {
        return $this->database->query("SELECT id, username, password,
                                      first_name AS firstName, last_name AS lastName,
                                      born_on AS bornO
                                      FROM users
                                      WHERE username= :userName")
            ->execute([':userName'=>$username])
            ->fetchAll(UserDTO::class)
            ->current();
    }

    public function findOneById(int $id): ?UserDTO
    {
        return $this->database->query("SELECT id, username, password,
                                      first_name AS firstName, last_name AS lastName,
                                      born_on AS bornOn
                                      FROM users
                                      WHERE id= :id")
            ->execute([':id'=>$id])
            ->fetchOne(UserDTO::class);
    }

    public function insert(UserDTO $user): bool
    {
        $this->database->query("INSERT INTO users 
                                      (username,password, first_name, last_name, born_on )
                                      VALUES(:username,:password, :firstName, :lastName, :bornOn);")
            ->execute([':username'=>$user->getUsername(),
                        ':password'=>$user->getPassword(),
                        ':firstName'=>$user->getFirstName(),
                        ':lastName'=>$user->getLastName(),
                        ':bornOn'=>$user->getBornOn()]);
        return true;
    }

    public function update(int $id, UserDTO $userDTOEdited): bool
    {
        $this->database->query("UPDATE users SET
                                      username = :username,
                                      password = :password,
                                      first_name = :firstName,
                                      last_name = :lastName,
                                      born_on = :bornOn
                                      WHERE id = :id;")
            ->execute([':username'=>$userDTOEdited->getUsername(),
                ':password'=>$userDTOEdited->getPassword(),
                ':firstName'=>$userDTOEdited->getFirstName(),
                ':lastName'=>$userDTOEdited->getLastName(),
                ':bornOn'=>$userDTOEdited->getBornOn(),
                'id'=>$id]);
        return true;
    }

    public function getAllUsers(): Generator
    {
        return $this->database->query("SELECT id, username, password,
                                      first_name AS firstName, last_name AS lastName,
                                      born_on AS bornOn
                                      FROM users;")
            ->execute()
            ->fetchAll(UserDTO::class);
    }
}