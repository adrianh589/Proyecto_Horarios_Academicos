<?php namespace Proyect\src\models\modelsDB;

use Exception;
use Proyect\src\config\Database;
use Proyect\src\models\DayModel;
use Proyect\src\models\modelsActions\HoursActions;
use \Proyect\src\models\modelsDB\CRUD;

/**
 * Class DayDB
 * @package Proyect\src\models\modelsDB
 * @author Adrian Hoyos
 */
class DayDB implements CRUD{

    /**
     * Get all days
     */
    public static function getAll()
    {
        $days = array();
        try {

            $conn = Database::getConnection();
            $stmt = $conn->query("SELECT id_dias, nombre FROM DIAS;");
            while ($row = $stmt->fetch($conn::FETCH_ASSOC)){
                $day = new DayModel();
                $day->setId($row['id_dias']);
                $day->setName($row['nombre']);
                array_push($days, $day);
            }
            $conn = null;//Close connection

        }catch (Exception $e){echo $e->getMessage();}
        return $days;
    }

    /**
     * Get the days according to the nrc
     * @param $nrc
     * @return array
     */
    public static function getBy($nrc)
    {
        $days = array();
        try {
            $conn = Database::getConnection();
            $stmt = $conn->query(" 
                    SELECT 
                           D.id_dias,
                           D.nombre, 
                           TIME_FORMAT(C.hora_inicio, '%H:%i') AS hora_inicio
                          ,TIME_FORMAT(C.hora_final, '%H:%i') AS hora_final
                    FROM NRCS AS N
                    INNER JOIN CLASES AS C ON N.id_nrcs = C.id_nrcs AND N.id_materias = C.id_materias AND N.id_jornadas = C.id_jornadas
                    INNER JOIN DIAS AS D ON C.id_dias = D.id_dias
                    WHERE N.id_nrcs = $nrc
                    ;");

            while ($row = $stmt->fetch($conn::FETCH_ASSOC)) {
                $day = new DayModel();
                $day->setId($row['id_dias']);
                $day->setName($row['nombre']);
                $day->setStartHour(HoursActions::convertToHours($row['hora_inicio']));
                $day->setFinalHour(HoursActions::convertToHours($row['hora_final']));
                array_push($days, $day);
            }
        }catch (Exception $e){echo $e->getMessage();}
        return $days;
    }

    /**
     * Delete a day by id
     */
    public static function delete($id)
    {
        $status = false;
        try {
            $conn = Database::getConnection();
            $status = $stmt = $conn->exec("DELETE FROM DIAS WHERE id_dias = $id");
            $conn = null;//Close connection
        }catch (Exception $e){echo $e->getMessage();}
        return $status;
    }


}