<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 1.11.2018 г.
 * Time: 22:41 ч.
 */

namespace App\Repository;
use App\Data\UserDTO;
use Database\DatabaseInterface;

class UserRepository implements UserRepositoryInterface
{

    /**
     * @var DatabaseInterface
     */
    private $db;

    public function __construct(DatabaseInterface $db)
    {
        $this->db=$db;
    }

    public function insert(UserDTO $userDTO): bool
    {
        $statement= $this->db->query("INSERT INTO users (username, password, 
                                           first_name, last_name, born_on)
                                           VALUES (:userName, :password, :firstName, 
                                           :lastName,:bornOn);");
        $statement->execute([
            ':userName'=>$userDTO->getUsername(),
            ':password'=>$userDTO->getPassword(),
            ':firstName'=>$userDTO->getFirstName(),
            ':lastName'=>$userDTO->getLastName(),
            ':bornOn'=>$userDTO->getBornOn()
        ]);

        return true;
    }

    public function findOneByUsername(string $username): ?UserDTO
    {
        return $this->db->query("SELECT id, username, password, 
                                      first_name AS firstName, last_name AS lastName,
                                      born_on AS bornOn 
                                      FROM users
                                      WHERE username = :userName")
            ->execute([':userName'=>$username])
            ->fetchAll(UserDTO::class)
            ->current();
    }

    public function findOneById(int $id): ?UserDTO
    {
        return $this->db->query("SELECT id, username, password, 
                                      first_name AS firstName, last_name AS lastName,
                                      born_on AS bornOn 
                                      FROM users
                                      WHERE id = :id;")
            ->execute([':id'=>$id])
            ->fetchAll(UserDTO::class)
            ->current();
    }

    public function update(int $id, UserDTO $userDTO): bool
    {
        $this->db->query("UPDATE users 
                                SET username = :username,
                                password = :password, 
                                first_name = :firstName,
                                last_name = :lastName,
                                born_on = :bornOn
                                WHERE id= :id")
            ->execute([
            ':username'=>$userDTO->getUsername(),
            ':password'=>$userDTO->getPassword(),
            ':firstName'=>$userDTO->getFirstName(),
            ':lastName'=>$userDTO->getLastName(),
            ':bornOn'=>$userDTO->getBornOn(),
            ':id'=>$id
        ]);

        return true;

    }

    /**
     * @return \Generator|UserDTO[]
     */
    public function findAll(): \Generator
    {
        return $this->db->query("SELECT id, username AS username,
                                           password, first_name AS firstName,
                                           last_name AS lastName, born_on AS bornOn
                                           FROM users")
                        ->execute()
                        ->fetchAll(UserDTO::class);
    }
}