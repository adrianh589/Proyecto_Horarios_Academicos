<?php namespace Proyect\src\controllers;

use Proyect\src\models\modelsDB\ProgramDB;//Load model

/**
 * Class ProgramController
 * @package Proyect\src\controllers
 * @author Adrian Hoyos
 */
class ProgramController
{

    /**
     * Get all Programs
     */
    public static function getAll()
    {
        $programs = ProgramDB::getAll();//Controller action logic
        require_once '../src/views/program/getAll.php';//Send to view
        return $result;
    }

    /**
     * Get Program by id
     */
    public static function getBy($id)
    {
        $program = ProgramDB::getBy($id);//Controller action logic
        require_once '../src/views/program/getBy.php';//Send to view
        return $result;
    }

    /**
     * Get Program by id
     */
    public static function getByPeriod($idPeriod)
    {
        $programs = ProgramDB::getByPeriod($idPeriod);//Controller action logic
        require_once '../src/views/program/getByProgram.php';//Send to view
        return $result;
    }

    /**
     * Delete a period by id
     */
    public static function delete($id)
    {
        $status = ProgramDB::delete($id);//Controller action logic
        require_once '../src/views/program/delete.php';//Send to view
        return $result;
    }

}