<?php namespace Proyect\src\controllers;

use Proyect\src\models\modelsDB\DayDB;//Load model

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

}