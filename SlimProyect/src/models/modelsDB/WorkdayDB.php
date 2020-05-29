<?php namespace Proyect\src\models\modelsDB;

use Exception;
use \Proyect\src\models\modelsDB\CRUD;
use Proyect\src\config\Database;
use Proyect\src\models\WorkdayModel;

/**
 * Class WorkdayDB
 * @package Proyect\src\models\modelsDB
 * @author Adrian Hoyos
 */
class WorkdayDB implements CRUD{

    public static function getAll()
    {
        $workdays = array();
        try {
            $conn = Database::getConnection();
            $stmt = $conn->query(" SELECT id_jornadas, nombre FROM JORNADAS;");
            while ($row = $stmt->fetch()){
                $workday = new WorkdayModel();
                $workday->setId($row['id_jornadas']);
                $workday->setName($row['nombre']);
                array_push($workdays, $workday);
            }
            $conn = null;//Close connection

        }catch (Exception $e){echo $e->getMessage();}
        return $workdays;
    }

    /**
     * Get workday by id
     * @param $id
     * @return mixed
     */
    public static function getById($id)
    {
        $workday = new WorkdayModel();
        try {
            $conn = Database::getConnection();
            $stmt = $conn->query(" SELECT id_jornadas, nombre FROM JORNADAS WHERE id_jornadas = $id;");

            if ($row = $stmt->fetch($conn::FETCH_ASSOC)){
                $workday->setId($row['id_jornadas']);
                $workday->setName($row['nombre']);
            }else{
                return array("message" => "This id does not exists");
            }

            $conn = null;//Close connection
        }catch (Exception $e){echo $e->getMessage();}
        return $workday;
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