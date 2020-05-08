<?php namespace Proyect\src\config;

/**
 * Class database
 * Class to connect to database.
 * @author Adrian Hoyos
 */
class database
{

    public static function connect()
    {
        $connection = new mysqli("localhost", "root", "", "unnamed");
        $connection->query("SET NAMES 'utf8' ");
        return $connection;
    }

}