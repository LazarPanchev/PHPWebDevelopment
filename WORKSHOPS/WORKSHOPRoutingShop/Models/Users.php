<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 28.10.2018 г.
 * Time: 14:26 ч.
 */

namespace Models;


use Exception;
use PDO;

class Users
{
    /**
     * @var \PDO
     */
    private $db_connection;

    /**
     * Users constructor.
     * @param $db_connection
     */
    public function __construct($db_connection)
    {
        $this->db_connection=$db_connection;
    }

    public function save()
    {
        $userName=$_POST['user_name']??null;
        $password=$_POST['password']??null;
        $names=$_POST['names']??null;

        $password= password_hash($password,PASSWORD_DEFAULT);
        $statement=$this->db_connection->prepare('INSERT INTO users (user_name, password, names)
                                                VALUES (:user_name,:password,:names)');
        $statement->bindParam('user_name',$userName);
        $statement->bindParam('password',$password);
        $statement->bindParam('names',$names);

        try{
            $statement->execute();
        }catch (\PDOException $e){
            throw new Exception('User already exists in db!');
        }
        return $this->db_connection->lastInsertId();
    }

    public function checkUser($data):?int        //return integer or null(?)
    {
        $userName=$data['user_name']??null;
        $password=$data['password']??null;
        $statement=$this->db_connection->prepare('SELECT user_id, password 
                                                FROM users
                                                WHERE user_name = :user_name');
        $statement->bindParam('user_name',$userName);
        $statement->execute();
        $result=$statement->fetch(PDO::FETCH_ASSOC);
        if($result){                                               //if we have such registered person
            if(password_verify($password,$result['password'])) {  //check does password match
                return $result['user_id'];
            }
        }
        return null;
    }
}