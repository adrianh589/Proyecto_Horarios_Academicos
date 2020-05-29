<?php namespace Proyect\src\controllers;

use Proyect\src\models\modelsDB\WorkdayDB;//Load model

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
     * Delete a nrc by id
     */
    public static function delete($id)
    {
        $status = WorkdayDB::delete($id);//Controller action logic
        require_once '../src/views/workday/delete.php';
        return $result;
    }

}