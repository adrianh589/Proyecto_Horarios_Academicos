<?php namespace Proyect\src\controllers;


use Proyect\src\models\modelsDB\NrcDB;

/**
 * Class NrcController
 * @package Proyect\src\controllers
 * @author Adrian Hoyos
 */
class NrcController
{

    /**
     * Get all nrcs
     */
    public static function getAll()
    {
        $nrcs = NrcDB::getAll();//Controller action logic
        require_once '../src/views/nrc/getAll.php';
        return $result;
    }

    /**
     * Get nrc by id
     */
    public static function getBy($id)
    {
        $nrc = NrcDB::getBy($id);//Controller action logic
        require_once '../src/views/nrc/getBy.php';//Send to view
        return $result;
    }

    /**
     * Delete a nrc by id
     */
    public static function delete($id)
    {
        $status = NrcDB::delete($id);//Controller action logic
        require_once '../src/views/nrc/delete.php';
        return $result;
    }

}