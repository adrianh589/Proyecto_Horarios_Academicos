<?php namespace Proyect\src\controllers;

use Proyect\src\models\modelsDB\PeriodDB;//Load Model

/**
 * Class PeriodController
 * @package Proyect\src\controllers
 */
class PeriodController
{

    /**
     * Get all periods
     * @return mixed
     */
    public static function getAll()
    {
        $periods = PeriodDB::getAll();//Controller action logic
        require_once '../src/views/period/getAll.php';//View
        return $result;
    }

    /**
     * Delete a period by id
     * @param $id
     * @return mixed
     */
    public static function delete($id)
    {
        $status = PeriodDB::delete($id);//Controller action logic
        require_once '../src/views/period/delete.php';//View
        return $result;
    }

}