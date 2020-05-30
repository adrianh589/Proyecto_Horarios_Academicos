<?php namespace Proyect\src\models\modelsDB;

use Exception;
use \Proyect\src\models\modelsDB\CRUD;
use Proyect\src\config\Database;
use Proyect\src\models\ProgramModel;

/**
 * Class ProgramDB
 * @package Proyect\src\models\modelsDB
 * @author Adrian Hoyos
 */
class ProgramDB implements CRUD {

    /**
     * Get all programs
     * @return array with programs
     */
    public static function getAll()
    {
        $programs = array();
        try {
            $conn = Database::getConnection();
            $stmt = $conn->query(" SELECT id_programas, nombre FROM PROGRAMAS;");
            while ($row = $stmt->fetch($conn::FETCH_ASSOC)){
                $program = new ProgramModel();
                $program->setId($row['id_programas']);
                $program->setName($row['nombre']);
                array_push($programs, $program);
            }
            $conn = null;//Close connection
        }catch (Exception $e){echo $e->getMessage();}
        return $programs;
    }

    /**
     * Get program by id
     * @param $id
     * @return mixed
     */
    public static function getBy($id)
    {
        $program = new ProgramModel();
        try {
            $conn = Database::getConnection();
            $stmt = $conn->query(" SELECT id_programas, nombre FROM PROGRAMAS WHERE id_programas = '$id';");

            if ($row = $stmt->fetch($conn::FETCH_ASSOC)){
                $program->setId($row['id_programas']);
                $program->setName($row['nombre']);
            }else{
                return array("message" => "This id does not exists");
            }

            $conn = null;//Close connection
        }catch (Exception $e){echo $e->getMessage();}
        return $program;
    }

    /**
     * Get program by id
     * @param $idPeriod
     * @return mixed
     */
    public static function getByPeriod($idPeriod)
    {
        $programs = array();
        try {
            $conn = Database::getConnection();
            $stmt = $conn->query("SELECT id_programas, nombre FROM PROGRAMAS WHERE id_periodos = $idPeriod;");

            while ($row = $stmt->fetch($conn::FETCH_ASSOC)){
                $program = new ProgramModel();
                $program->setId($row['id_programas']);
                $program->setName($row['nombre']);
                array_push($programs, $program);
            }

            $conn = null;//Close connection
        }catch (Exception $e){echo $e->getMessage();}
        return $programs;
    }

    /**
     * Delete a program by id
     */
    public static function delete($id)
    {
        $status = false;
        try {
            $conn = Database::getConnection();
            $status = $stmt = $conn->exec("DELETE FROM PROGRAMAS WHERE id_programas = '$id'");
            $conn = null;//Close connection
        }catch (Exception $e){echo $e->getMessage();}
        return $status;
    }
}