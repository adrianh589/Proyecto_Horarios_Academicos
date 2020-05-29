<?php namespace Proyect\src\models\modelsDB;

use Exception;
use Proyect\src\config\Database;
use Proyect\src\models\modelsDB\CRUD;
use Proyect\src\models\SubjectModel;

/**
 * Class SubjectDB
 * @package Proyect\src\models\modelsDB
 * @author Adrian Hoyos
 */
class SubjectDB implements CRUD
{

    /**
     * Get all subjects
     * @return array with all subjects
     */
    public static function getAll()
    {
        $list = array();
        try {
            $connection = Database::getConnection();//Connect to data base
            $stmt = $connection->query("
            SELECT 
                   M.id_materias    AS id,
                   PER.nombre       AS periodo,
                   M.nombre         AS materia,
                   N.id_nrcs        AS nrc,
                   M.id_materias    AS alfanumerico,
                   M.creditos       AS creditos,
                   P.nombre         AS programa,
                   J.nombre         AS jornada,
                   M.semestre       AS semestre
            FROM PERIODOS AS PER
            INNER JOIN PROGRAMAS P ON PER.id_periodos = P.id_periodos
            INNER JOIN PROGRAMAS_MATERIAS PM ON P.id_programas = PM.id_programas AND P.id_periodos = PM.id_periodos
            INNER JOIN MATERIAS M ON PM.id_materias = M.id_materias
            INNER JOIN NRCS N ON M.id_materias = N.id_materias
            INNER JOIN JORNADAS J ON N.id_jornadas = J.id_jornadas
            ORDER BY M.nombre, N.id_nrcs;");

            while ($row = $stmt->fetch($connection::FETCH_ASSOC)) {
                $subject = new SubjectModel();
                $subject->setId($row['id']);
                $subject->setName($row['materia']);
                $subject->setNrc($row['nrc']);
                $subject->setAlfanumeric($row['alfanumerico']);
                $subject->setCredits($row['creditos']);
                $subject->setDays(DayDB::getBy($subject->getNrc()));
                $subject->setProgram($row['programa']);
                $subject->setWorkday($row['jornada']);
                $subject->setSemester($row['semestre']);
                array_push($list, $subject);
            }
            $connection = null;//Close connection
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $list;
    }

    /**
     * Get subject by nrc
     * @param $nrc
     */
    public static function getBy($nrc)
    {
        $subject = new SubjectModel();
        try {
            $conn = Database::getConnection();
            $stmt = $conn->query(" 
                SELECT 
                   M.id_materias    AS id,
                   PER.nombre       AS periodo,
                   M.nombre         AS materia,
                   N.id_nrcs        AS nrc,
                   M.id_materias    AS alfanumerico,
                   M.creditos       AS creditos,
                   P.nombre         AS programa,
                   J.nombre         AS jornada,
                   M.semestre       AS semestre
            FROM PERIODOS AS PER
            INNER JOIN PROGRAMAS P ON PER.id_periodos = P.id_periodos
            INNER JOIN PROGRAMAS_MATERIAS PM ON P.id_programas = PM.id_programas AND P.id_periodos = PM.id_periodos
            INNER JOIN MATERIAS M ON PM.id_materias = M.id_materias
            INNER JOIN NRCS N ON M.id_materias = N.id_materias
            INNER JOIN JORNADAS J ON N.id_jornadas = J.id_jornadas
            WHERE N.id_nrcs = $nrc;
            ");

            if ($row = $stmt->fetch($conn::FETCH_ASSOC)){
                $subject = new SubjectModel();
                $subject->setId($row['id']);
                $subject->setName($row['materia']);
                $subject->setNrc($row['nrc']);
                $subject->setAlfanumeric($row['alfanumerico']);
                $subject->setCredits($row['creditos']);
                $subject->setDays(DayDB::getBy($subject->getNrc()));
                $subject->setProgram($row['programa']);
                $subject->setWorkday($row['jornada']);
                $subject->setSemester($row['semestre']);
            }else{
                return array("message" => "This id does not exists");
            }

            $conn = null;//Close connection
        }catch (Exception $e){echo $e->getMessage();}
        return $subject;
    }

    /**
     * Delete a subject by id
     */
    public static function delete($id)
    {
        $status = false;
        try {
            $conn = Database::getConnection();
            $status = $stmt = $conn->exec("DELETE FROM MATERIAS WHERE id_materias = '$id'");
            $conn = null;//Close connection
        }catch (Exception $e){echo $e->getMessage();}
        return $status;
    }


}