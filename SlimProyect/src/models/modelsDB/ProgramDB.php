<?php namespace Proyect\src\models\modelsDB;

use \Proyect\src\models\modelsDB\CRUD;
use Proyect\src\config\Database;
use Proyect\src\models\PeriodModel;

/**
 * Class ProgramDB
 * @package Proyect\src\models\modelsDB
 * @author Adrian Hoyos
 */
class ProgramDB implements CRUD {

    public static function getAll()
    {
        try {
            $programs = array();
            $conn = Database::getConnection();
            $stmt = $conn->query(" SELECT id_programas, nombre FROM PROGRAMAS;");
            while ($row = $stmt->fetch()){
                $period = new PeriodModel();
                $period->setId($row['id_programas']);
                $period->setName($row['nombre']);
                array_push($programs, $period);
            }
            $conn = null;//Close connection
            return $programs;
        }catch (Exception $e){echo $e->getMessage();}
    }

    public function update($object)
    {
        // TODO: Implement update() method.
    }

    public function delete($object)
    {
        // TODO: Implement delete() method.
    }
}