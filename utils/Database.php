<?php

//Ce fichier contient toutes les informations de connexion
$dbName = 'sdbm_v2';
$bdd = 'sdbm_v2';
$dbHost = 'localhost';
$dbUsername = 'root';
$username = 'root';
$dbUserPassword = '';
$pass  = '';
$cont = null;

class Database
{
    private static $dbName = 'sdbm_v2';
    private static $dbHost = 'localhost';
    private static $dbUsername = 'root';
    private static $dbUserPassword = '';
    private static $cont = null;
    public function __construct()
    {
        die('Init function is not allowed');
    }
    public static function connect()
    {
        if (null == self::$cont) {
            try {
                self::$cont = new PDO("mysql:host=" . self::$dbHost . ";" . "dbname=" . self::$dbName, self::$dbUsername, self::$dbUserPassword);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$cont;
    }

    public static function disconnect()
    {
        self::$cont = null;
    }
}
