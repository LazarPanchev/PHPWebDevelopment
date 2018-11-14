<?php

namespace App\Repository;


use App\Data\UserDTO;
use Database\PDODatabase;
use Generator;

class UserRepository implements UserRepositoryInterface
{
    private $pdoDatabase;

    public function __construct(PDODatabase $pdoDatabase)
    {
        $this->pdoDatabase=$pdoDatabase;
    }

    public function findOneByUsername(string $username): ?UserDTO
    {
        return $this->pdoDatabase->query("SELECT id, username, password, first_name AS firstName,
                                               last_name AS lastName, born_on AS bornOn
                                               FROM users
                                               WHERE username = :username;")
            ->execute([':username'=>$username])
            ->fetchAll(UserDTO::class)
            ->current();
    }

    public function insert(UserDTO $user): bool
    {
        $this->pdoDatabase->query("INSERT INTO users (username,password,first_name,last_name,born_on)
                                         VALUES (:userName, :password, :firstName, :lastName, :bornOn);")
            ->execute([
                ':userName'=>$user->getUsername(),
                'password'=>$user->getPassword(),
                'firstName'=>$user->getFirstName(),
                'lastName'=>$user->getLastName(),
                'bornOn'=>$user->getBornOn()
                ]);

        return true;
    }

    public function findOneById($id): ?UserDTO
    {
        return $this->pdoDatabase->query("SELECT id, username, password, first_name AS firstName,
                                               last_name AS lastName, born_on AS bornOn
                                               FROM users
                                               WHERE id = :id;")
            ->execute([':id'=>$id])
            ->fetchAll(UserDTO::class)
            ->current();
    }

    public function update(UserDTO $editedUser, string $id): bool
    {
        $this->pdoDatabase->query("UPDATE users
                                         SET username = :userName,
                                         password = :password,
                                         first_name = :firstName,
                                         last_name = :lastName,
                                         born_on = :bornOn
                                         WHERE id = :id;")
            ->execute([
                ':userName'=>$editedUser->getUsername(),
                ':password'=>$editedUser->getPassword(),
                ':firstName'=>$editedUser->getFirstName(),
                ':lastName'=>$editedUser->getLastName(),
                ':bornOn'=>$editedUser->getBornOn(),
                ':id'=>$id
                ]);

        return true;
    }

    /**
     * @return Generator|UserDTO[]
     */
    public function findAll(): Generator
    {
        return $this->pdoDatabase->query("SELECT id, username, password, first_name AS firstName,
                                               last_name AS lastName, born_on AS bornOn
                                               FROM users")
            ->execute()
            ->fetchAll(UserDTO::class);
    }
}