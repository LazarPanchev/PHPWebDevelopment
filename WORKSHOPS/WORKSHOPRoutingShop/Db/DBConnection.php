<?php
namespace Db;

use \PDO as PDO;   //equal to default namespace(global)-> \PDO

class DBConnection
{
    public static function getConnection(){
        $dsn='mysql:host=localhost;dbname=shop';
        $userName='root';
        $password='';
        return new PDO($dsn,$userName,$password,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]); //turn on the exception mode

    }
}