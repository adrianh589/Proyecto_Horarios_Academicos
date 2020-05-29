<?php namespace Proyect\src\models\modelsActions;

use Proyect\src\models\DayModel;
use Proyect\src\models\SubjectModel;

/**
 * Class SubjectActions
 * @package Proyect\src\models\modelsActions
 * @author Adrian Hoyos
 */
class SubjectActions
{

    /**
     * Function to classify a subject in the server,
     * the subjects must have the same name to be classified
     * @param SubjectModel $subject Receives a subject object
     */
    public static function saveSubjectInSession(SubjectModel $subject)
    {
        $found = false;

        if(self::createSession("subjects")) {//Initialize an array in the session
            array_push($_SESSION['subjects'], array($subject));
            //$_SESSION['subjects'] = array(array($subject));
        }else {

            for ($i = 0; $i < count($_SESSION['subjects']); $i++) {
                if ($_SESSION['subjects'][$i][0]->getName() === $subject->getName()) {
                    array_push($_SESSION['subjects'][$i], $subject);
                    $found = true;
                    break;
                }
            }

            if ($found == false) {
                array_push($_SESSION['subjects'], array($subject));
            }
        }
    }

    /**
     * Function to create a session
     */
    public static function createSession($nameofsession)
    {
        self::sessionStart();
        if(!isset($_SESSION["{$nameofsession}"])){
            $_SESSION["{$nameofsession}"] = array();
            return true;
        }
        return false;
    }

    /**
     * Function to destroy the session of subjects
     */
    public static function destroySession($nameofsession)
    {
        //Destroy the session if exists
        self::sessionStart();
        if( isset($_SESSION["{$nameofsession}"]) ){
            unset($_SESSION["{$nameofsession}"] );
        }
    }

//    /**
//     * Function to build subjects
//     */
//    public static function buildSubjects()
//    {
//
//        self::destroySession("subjects");
//
//        /************************ARQUITECTURA DE SOFTWARE********************************************/
//
//        $arq = new SubjectModel(
//            "Arquitectura de Software",
//            "3460",
//            "ISUM 8522",
//            3,
//            array(
//                new DayModel("lunes", HoursActions::convertToHours("18:15"), HoursActions::convertToHours("19:44")),
//                new DayModel("jueves", HoursActions::convertToHours("20:30"), HoursActions::convertToHours("21:59"))
//            ),
//            "Ingeneria de Sistemas",
//            "Mañana"
//        );
//        self::saveSubjectInSession($arq);
//
//        $arq2 = new SubjectModel(
//            "Arquitectura de Software",
//            "8213",
//            "ISUM 8522",
//            3,
//            array(
//                new DayModel("lunes", HoursActions::convertToHours("20:30"), HoursActions::convertToHours("21:59")),
//                new DayModel("jueves", HoursActions::convertToHours("18:15"), HoursActions::convertToHours("19:44"))
//            ),
//            "Ingeneria de Sistemas",
//            "Mañana"
//        );
//        self::saveSubjectInSession($arq2);
//
//        $arq3 = new SubjectModel(
//            "Arquitectura de Software",
//            "8217",
//            "ISUM 8522",
//            3,
//            array(
//                new DayModel("miercoles", HoursActions::convertToHours("20:30"), HoursActions::convertToHours("21:59")),
//                new DayModel("viernes", HoursActions::convertToHours("18:15"), HoursActions::convertToHours("19:44"))
//            ),
//            "Ingeneria de Sistemas",
//            "Mañana");
//        self::saveSubjectInSession($arq3);
//
//        $arq4 = new SubjectModel(
//            "Arquitectura de Software",
//            "11602",
//            "ISUM 8522",
//            3,
//            array(
//                new DayModel("miercoles", HoursActions::convertToHours("18:15"), HoursActions::convertToHours("19:44")),
//                new DayModel("sabado", HoursActions::convertToHours("20:30"), HoursActions::convertToHours("21:59"))
//            ),
//            "Ingeneria de Sistemas",
//            "Mañana");
//        self::saveSubjectInSession($arq4);
//        /************************ARQUITECTURA DE SOFTWARE********************************************/
//
//        /************************BASES DE DATOS MASIVAS********************************************/
//
//        $bdm = new SubjectModel(
//            "Bases de datos masivas",
//            "3468",
//            "ISUM 8522",
//            3,
//            array(
//                new DayModel("martes", HoursActions::convertToHours("18:15"), HoursActions::convertToHours("19:44")),
//                new DayModel("sabado", HoursActions::convertToHours("21:15"), HoursActions::convertToHours("21:59"))
//            ),
//            "Ingeneria de Sistemas",
//            "Mañana");
//        self::saveSubjectInSession($bdm);
//
//        $bdm2 = new SubjectModel(
//            "Bases de datos masivas",
//            "13811",
//            "ISUM 8522",
//            3,
//            array(
//                new DayModel("martes", HoursActions::convertToHours("20:30"), HoursActions::convertToHours("21:59")),
//                new DayModel("viernes", HoursActions::convertToHours("18:15"), HoursActions::convertToHours("19:44"))
//            ),
//            "Ingeneria de Sistemas",
//            "Mañana");
//        self::saveSubjectInSession($bdm2);
//
//        /************************BASES DE DATOS MASIVAS********************************************/
//
//        /************************ ECUACIONES DIFERENCIALES******************************************/
//
//        $dif = new SubjectModel(
//            "Ecuaciones Diferenciales",
//            "3906",
//            "ISUM 8522",
//            3,
//            array(
//                new DayModel("martes", HoursActions::convertToHours("20:30"), HoursActions::convertToHours("21:59")),
//                new DayModel("viernes", HoursActions::convertToHours("20:30"), HoursActions::convertToHours("21:59"))
//            ),
//            "Ingeneria de Sistemas",
//            "Noche");
//        self::saveSubjectInSession($dif);
//
//        /*******************************************************************************************/
//
//        /*****************************EDIS**********************************************************/
//        $edis = new SubjectModel(
//            "Estructuras de internet Redes y Servidores",
//            "3463",
//            "ISUM 8522",
//            3,
//            array(
//                new DayModel("martes", HoursActions::convertToHours("18:15"), HoursActions::convertToHours("19:44")),
//                new DayModel("jueves", HoursActions::convertToHours("20:30"), HoursActions::convertToHours("21:59"))
//            ),
//            "Ingeneria de Sistemas",
//            "Mañana");
//        self::saveSubjectInSession($edis);
//    }

    /**
     * Function to start session if not exists
     */
    public static function sessionStart()
    {
        if( session_status() == PHP_SESSION_NONE  ) {//If the session not exists
            session_start();
        }
    }


}