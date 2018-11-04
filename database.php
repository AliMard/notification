<?php





class DataBase
{


    private $_connection;
    private static $_instance;
    private $_username="USER_NAME";
    private $_password="PASSWORD";
    private $_dsn="mysql:host=localhost;dbname=DB_NAME";


    public static function getInstance()
    {

        if (!self::$_instance){
            self::$_instance = new self();
        }

        return self::$_instance;
    }





    private function __construct()
    {

        try{

            $this->_connection = new PDO($this->_dsn,$this->_username,$this->_password,[PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8']);

        }catch (PDOException $e){

        echo $e->__toString();

        }

    }



    private function __clone(){}



    public function getConnection()
    {
        return $this->_connection;
    }



}










