<?php namespace Proyect\src\models\modelsDB;

use Exception;
use Proyect\src\models\modelsDB\CRUD;
use Proyect\src\config\Database;
use Proyect\src\models\SemesterModel;

/**
 * Class SemesterDB
 * @package Proyect\src\models\modelsDB
 * @author Adrian Hoyos
 */
class SemesterDB {

    /**
     * Get all semesters
     */
    public static function getAll()
    {
        $semesters = array();
        try {
            $conn = Database::getConnection();
            $stmt = $conn->query("SELECT semestre FROM MATERIAS GROUP BY semestre;");
            while ($row = $stmt->fetch()){
                $semester = new SemesterModel();
                $semester->setSemester($row['semestre']);
                array_push($semesters, $semester);
            }
            $conn = null;//Close connection
        }catch (Exception $e){echo $e->getMessage();}
        return $semesters;
    }
}