<?php namespace Proyect\src\controllers;

use Proyect\src\models\modelsDB\SubjectDB;//Load model

/**
 * Class SubjectController
 * @package Proyect\src\controllers
 * @author Adrian Hoyos
 */
class SubjectController {

    /**
     * Get all subjects from the database
     * @return mixed
     */
    public static function getAll()
    {
        $subjects = SubjectDB::getAll();//Controller action logic
        require_once '../src/views/subject/getAll.php';//Send to view
        return $result;
    }

    //Get by alfanumeric
    public static function getByNRC(string $nrc)
    {

    }

}