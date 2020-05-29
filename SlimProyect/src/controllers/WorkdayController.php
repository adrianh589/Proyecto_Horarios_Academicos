<?php namespace Proyect\src\controllers;

use Proyect\src\models\modelsDB\WorkdayDB;//Load model

/**
 * Class WorkdayController
 * @package Proyect\src\controllers
 * @author Adrian Hoyos
 */
class WorkdayController
{

    /**
     * Get all workdays
     */
    public static function getAll()
    {
        $workdays = WorkdayDB::getAll();//Controller action logic
        require_once '../src/views/workday/getAll.php';//Send to view
        return $result;
    }

    /**
     * Get workday by id
     */
    public static function getById($id)
    {
        $workday = WorkdayDB::getById($id);//Controller action logic
        require_once '../src/views/workday/getByNRC.php';//Send to view
        return $result;
    }

    /**
     * Delete a nrc by id
     */
    public static function delete($id)
    {
        $status = WorkdayDB::delete($id);//Controller action logic
        require_once '../src/views/workday/delete.php';
        return $result;
    }

}