<?php namespace Proyect\src\models\modelsDB;

use \Proyect\src\models\modelsDB\CRUD;
use Proyect\src\config\Database;
use Proyect\src\models\WorkdayModel;

/**
 * Class WorkdayDB
 * @package Proyect\src\models\modelsDB
 * @author Adrian Hoyos
 */
class WorkdayDB implements CRUD{

    public function getById($id)
    {
        //Create an object and return the result, easy
    }

    public static function getAll()
    {
        try {
            $workdays = array();
            $conn = Database::getConnection();
            $stmt = $conn->query(" SELECT id_jornadas, nombre FROM JORNADAS;");
            while ($row = $stmt->fetch()){
                $workday = new WorkdayModel();
                $workday->setId($row['id_jornadas']);
                $workday->setName($row['nombre']);
                array_push($workdays, $workday);
            }
            $conn = null;//Close connection
            return $workdays;
        }catch (Exception $e){echo $e->getMessage();}
    }

    public function update($object)
    {
        // TODO: Implement update() method.
    }

    /**
     * Delete a workday by id
     */
    public static function delete($id)
    {
        $status = false;
        try {
            $conn = Database::getConnection();
            $status = $stmt = $conn->exec("DELETE FROM JORNADAS WHERE id_jornadas = $id");
            $conn = null;//Close connection
        }catch (Exception $e){echo $e->getMessage();}
        return $status;
    }
}