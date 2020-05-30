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
     * Get all semesters
     */
    public static function getSemesters()
    {
        $semesters = SubjectDB::getSemesters();//Controller action logic
        require_once '../src/views/subject/getSemesters.php';//Send to view
        return $result;
    }

    /**
     * Get subject by id
     * @param $nrc
     */
    public static function getBy($nrc)
    {
        $subject = SubjectDB::getBy($nrc);//Controller action logic
        require_once '../src/views/subject/getBy.php';//Send to view
        return $result;
    }

    /**
     * Get subject by period
     * @param $nrc
     */
    public static function getByProgram($idProgram)
    {
        $subjects = SubjectDB::getByProgram($idProgram);//Controller action logic
        require_once '../src/views/subject/getByProgram.php';//Send to view
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