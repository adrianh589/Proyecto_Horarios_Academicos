<?php


class database
{

    public static function connect()
    {
        $connection = new mysqli("localhost", "root", "", "unnamed");

        $connection->query("SET NAMES 'utf8' ");

        return $connection;
    }

}