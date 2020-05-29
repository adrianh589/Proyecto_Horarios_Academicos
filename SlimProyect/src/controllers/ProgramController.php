<?php namespace Proyect\src\controllers;

use Proyect\src\models\modelsDB\ProgramDB;//Load model


class ProgramController
{

    /**
     * Get all periods
     */
    public static function getAll()
    {
        $periods = ProgramDB::getAll();//Controller action logic
        require_once '../src/views/period/getAll.php';//Send to view
        return $result;
    }

}