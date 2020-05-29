<?php namespace Proyect\src\controllers;

use Proyect\src\models\modelsDB\PeriodDB;//Load Model

/**
 * Class PeriodController
 * @package Proyect\src\controllers
 */
class PeriodController
{

    public static function getAll()
    {
        $periods = PeriodDB::getAll();//Controller action logic
        require_once '../src/views/period/getAll.php';//View
        return $result;
    }

}