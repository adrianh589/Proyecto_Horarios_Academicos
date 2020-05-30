<?php namespace Proyect\src\models\modelsDB;

use Exception;
use Proyect\src\config\Database;
use Proyect\src\models\modelsActions\ScheduleActions;
use Proyect\src\models\modelsActions\SubjectActions;
use Proyect\src\models\SubjectModel;
use Proyect\src\models\modelsDB\CRUD;

/**
 * Class ScheduleDB
 * @package Proyect\src\models\modelsDB
 * @author Adrian Hoyos
 */
class ScheduleDB
{

    /**
     * Function to build subjects in $_SESSION['subjects']
     */
    public static function buildSubjects(array $subjectsPOST): void
    {
        //SubjectActions::destroySession("subjects");//Destroy session if exists
        try {
            $connection = Database::getConnection();//Connect to data base

            for ($i = 0; $i < count($subjectsPOST); $i++) {//iterate subject
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
                        WHERE M.id_materias = '$subjectsPOST[$i]'
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
                    SubjectActions::saveSubjectInSession($subject);//Load in $_SESSION['subjects']
                }
            }
            $connection = null;//Close connection
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

}