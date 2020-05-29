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

    public function getById($id)
    {
        //Create an object and return the result, easy
    }

    public function getByAlfanumeric($name)
    {
        try{
            $connection = Database::getConnection();//Connect to data base
            $stmt = $connection->query("");

        }catch (Exception $e){echo $e->getMessage();}
    }

    public static function getAll()
    {
        try {
            $list = array();
            $connection = Database::getConnection();//Connect to data base
            $stmt = $connection->query("
            SELECT PER.nombre       AS periodo,
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
                $subject->setName($row['materia']);
                $subject->setNrc($row['nrc']);
                $subject->setAlfanumeric($row['alfanumerico']);
                $subject->setCredits($row['creditos']);
                $subject->setDays(DayDB::getByNRC($subject->getNrc()));
                $subject->setProgram($row['programa']);
                $subject->setWorkday($row['jornada']);
                $subject->setSemester($row['semestre']);
                array_push($list, $subject);
            }
            $connection = null;//Close connection
            return $list;//return all periods
        } catch (Exception $e) {
            echo $e->getMessage();
        }
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