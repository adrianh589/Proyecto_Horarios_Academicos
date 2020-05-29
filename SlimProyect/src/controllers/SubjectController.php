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

    /**
     * Get subject by id
     * @param $nrc
     */
    public static function getByNRC($nrc)
    {
        $subject = SubjectDB::getById($nrc);//Controller action logic
        require_once '../src/views/subject/getByNRC.php';//Send to view
        return $result;
    }

    /**
     * Delete a subject with id
     * @param $id
     */
    public static function delete($id)
    {
        $status = SubjectDB::delete($id);//Controller action logic
        require_once '../src/views/subject/delete.php';//Send to view
        return $result;
    }



}