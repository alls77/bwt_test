<?php
namespace app\components;
use PDO;

class Db
{
    private $connection;
    private static $_instance;

    private function __construct () {

        $params = parse_ini_file(ROOT . '/config/db_params.ini');

        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        );

        $dsn = "mysql:host = {$params['host']};dbname={$params['dbname']}";
        $this->connection = new PDO($dsn, $params['user'], $params['password'], $options);
    }

    private function __clone(){}

    public static function getInstance(){
        if(!self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function getConnection(){
        return $this->connection;
    }
}