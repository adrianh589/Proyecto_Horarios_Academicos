<?php namespace Proyect\src\config;

use PDO;
use PDOException;

/**
 * Class Database
 * @package Proyect\src\config
 * @author Adrian Hoyos
 */
class Database{

    // specify your own database credentials
    private static $host = "localhost";
    private static $db_name = "bd_horarios";
    private static $username = "root";
    private static $password = "";
    public static $conn;

    // get the database connection
    public static function getConnection(){

        self::$conn = null;

        try{
            self::$conn = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$db_name, self::$username, self::$password);
            self::$conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return self::$conn;
    }
}
?>