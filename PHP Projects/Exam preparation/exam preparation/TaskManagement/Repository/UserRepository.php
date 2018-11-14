<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 8.11.2018 г.
 * Time: 20:33 ч.
 */

namespace TaskManagement\Repository;
use Database\DatabaseInterface;
use TaskManagement\DTO\userDTO;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $pdoDatabase;

    /**
     * UserRepository constructor.
     * @param DatabaseInterface $database
     */
    public function __construct(DatabaseInterface $database)
    {
        $this->pdoDatabase=$database;
    }

    public function findOneByUsername(string $username): ?UserDTO
    {
        return $this->pdoDatabase->query("SELECT user_id AS userId, username, password, first_name AS firstName,
                                               last_name AS lastName
                                               FROM users
                                               WHERE username = :username;")
            ->execute([':username'=>$username])
            ->fetchAll(UserDTO::class)
            ->current();
    }

    public function insert(UserDTO $user): bool
    {
        $this->pdoDatabase->query("INSERT INTO users (username,password,first_name,last_name)
                                         VALUES (:userName, :password, :firstName, :lastName);")
            ->execute([
                ':userName'=>$user->getUsername(),
                ':password'=>$user->getPassword(),
                ':firstName'=>$user->getFirstName(),
                ':lastName'=>$user->getLastName(),
            ]);

        return true;
    }

    public function findOneById($id): ?UserDTO
    {
        return $this->pdoDatabase->query("SELECT user_id AS userId,
                                               username, password, first_name AS firstName,
                                               last_name AS lastName
                                               FROM users
                                               WHERE user_id = :id;")
            ->execute([':id'=>$id])
            ->fetchAll(UserDTO::class)
            ->current();
    }
}