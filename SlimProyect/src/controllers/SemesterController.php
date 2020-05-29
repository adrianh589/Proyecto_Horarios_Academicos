<?php namespace Proyect\src\controllers;


use Proyect\src\models\modelsDB\SemesterDB;

class SemesterController
{

    /**
     * Get all semesters
     */
    public static function getAll()
    {
        $semesters = SemesterDB::getAll();//Controller action logic
        require_once '../src/views/semester/getAll.php';//Send to view
        return $result;
    }

}