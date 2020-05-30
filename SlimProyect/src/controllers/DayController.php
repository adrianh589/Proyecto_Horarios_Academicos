<?php namespace Proyect\src\controllers;

use Proyect\src\models\modelsDB\DayDB;//Load model

/**
 * Class DayController
 * @package Proyect\src\controllers
 * @author Adrian Hoyos
 */
class DayController
{

    /**
     * Get all days
     */
    public static function getAll()
    {
        $days = DayDB::getAll();//Controller action logic
        require_once '../src/views/day/getAll.php';//Send to view
        return $result;
    }

    /**
     * Get days by nrc
     */
    public static function getBy($id)
    {
        $days = DayDB::getBy($id);//Controller action logic
        require_once '../src/views/day/getBy.php';//Send to view
        return $result;
    }

    /**
     * Delete a day by id
     * @param $id of day
     */
    public static function delete($id)
    {
        $status = DayDB::delete($id);
        require_once '../src/views/day/delete.php';
        return $result;
    }

}