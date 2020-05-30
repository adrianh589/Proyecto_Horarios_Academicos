<?php namespace Proyect\src\models\modelsDB;

use Proyect\src\models\modelsDB\CRUD;

/**
 * Class ScheduleDB
 * @package Proyect\src\models\modelsDB
 * @author Adrian Hoyos
 */
class ScheduleDB{

    /**
     * Function to build subjects
     */
    public static function buildSubjects()
    {
        self::destroySession("subjects");
        $arq = new SubjectModel();
        self::saveSubjectInSession($arq);
    }

}