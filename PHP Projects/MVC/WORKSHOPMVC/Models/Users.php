<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 28.10.2018 г.
 * Time: 14:26 ч.
 */

namespace Models;


use DTO\UserDTO;
use Exception;
use Database\PDODatabase;

class Users
{
    /**
     * @var \Database\PDODatabase
     */
    private $db_connection;

    /**
     * Users constructor.
     * @param $db_connection
     */
    public function __construct(PDODatabase $db_connection)
    {
        $this->db_connection=$db_connection;
    }

    public function save()
    {
        $userName=$_POST['user_name']??null;
        $password=$_POST['password']??null;
        $names=$_POST['names']??null;

        $password= password_hash($password,PASSWORD_DEFAULT);
        $statement=$this->db_connection->query('INSERT INTO users (user_name, password, names)
                                                VALUES (:user_name,:password,:names)');
        try{
            $statement->execute([':user_name'=>$userName, ':password'=>$password, ':names'=>$names]);
        }catch (Exception $e){
            throw new Exception('User already exists in db!');
        }
        return $this->db_connection->getLastId();
    }

    public function checkUser($data):?int        //return integer or null(?)
    {
        $userName=$data['user_name']??null;
        $password=$data['password']??null;
        $statement=$this->db_connection->query('SELECT user_id AS userId, password
                                                FROM users
                                                WHERE user_name = :userName');
        $resultSet = $statement->execute([':userName'=>$userName]);
        /**
         * @var UserDTO $user
         */
        $user =$resultSet->fetchOne(UserDTO::class);
        print_r($user);
        if($user){                                               //if we have such registered person
            $passFromDb=$user->getPassword();
            if(password_verify($password,$passFromDb)) {  //check does password match
                return $user->getUserId();
            }
        }
        return null;
    }
}