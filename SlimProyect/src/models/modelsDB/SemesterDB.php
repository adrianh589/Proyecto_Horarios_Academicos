<?php namespace Proyect\src\models\modelsDB;

use Proyect\src\models\modelsDB\CRUD;
use Proyect\src\config\Database;
use Proyect\src\models\SemesterModel;

class SemesterDB implements CRUD{

    /**
     * Get all semesters
     */
    public static function getAll()
    {
        try {
            $semesters = array();
            $conn = Database::getConnection();
            $stmt = $conn->query("SELECT semestre FROM MATERIAS GROUP BY semestre;");
            while ($row = $stmt->fetch()){
                $semester = new SemesterModel();
                $semester->setSemester($row['semestre']);
                array_push($semesters, $semester);
            }
            $conn = null;//Close connection
            return $semesters;
        }catch (Exception $e){echo $e->getMessage();}
    }
}