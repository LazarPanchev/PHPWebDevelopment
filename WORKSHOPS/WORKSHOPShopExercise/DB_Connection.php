<?php


class DB_Connection
{
    /**
     * @var string
     */
    private $mysqlHost;

    /**
     * @var string
     */
    private $dbName;

    /**
     * @var string
     */
    private $user;
    /**
     * @var string
     */
    private $password;

    public function __construct()
    {
        $this->mysqlHost='mysql:host=localhost;';
        $this->dbName='dbname=shop';
        $this->user='root';
        $this->password='';
    }

    public function getConnection(){
        $dsn=$this->mysqlHost . $this->dbName;
        return new PDO($dsn,$this->user,$this->password, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
    }

}