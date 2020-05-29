<?php namespace Proyect\src\controllers;

use Proyect\src\models\modelsDB\ProgramDB;//Load model


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
    public static function getById($id)
    {
        $program = ProgramDB::getById($id);//Controller action logic
        require_once '../src/views/program/getByNRC.php';//Send to view
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