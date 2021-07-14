<?php


namespace model;
use controller\Configurations;
use \PDO;

 class DatabaseConnection
{


     static private $_instance;



    protected function __construct()
    {
    }


    protected function __clone()
    {
    }


    static public function getInstance() {

        if(!empty(self::$_instance)) {

            return self::$_instance;

        } else {

            self::$_instance = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4',
                DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

        }
        return self::$_instance;

    }


    static public function query($query, $one = NULL) {
        if($one === true) {
            $sth = self::getInstance()->query($query);
            $res = $sth->fetchObject();
        } elseif($one === false) {
            $sth = self::getInstance()->query($query);
            $res = $sth->fetchAll(PDO::FETCH_CLASS);
        } else {
            $sth = self::getInstance()->query($query,PDO::FETCH_ASSOC);
            $res = $sth->fetchAll();
        }

       return $res;

    }
}