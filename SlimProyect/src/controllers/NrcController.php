<?php namespace Proyect\src\controllers;


use Proyect\src\models\modelsDB\NrcDB;

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
     * Delete a nrc by id
     */
    public static function delete($id)
    {
        $status = NrcDB::delete($id);//Controller action logic
        require_once '../src/views/nrc/delete.php';
        return $result;
    }

}