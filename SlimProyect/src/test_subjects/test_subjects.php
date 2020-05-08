<?php

use Proyect\src\models\SubjectModel;
use Proyect\src\models\DayModel;
use Proyect\src\models\traits\HoursT;
use Proyect\src\models\WorkDayModel;
use Proyect\src\models\NrcModel;
use Proyect\src\models\ProgramModel;

$subjects = array();

session_start();
if( isset($_SESSION['subjects']) ) {//If the session exists
    unset($_SESSION['subjects']);
}

/************************ARQUITECTURA DE SOFTWARE********************************************/

$arq = new SubjectModel(
    "Arquitectura de Software",
    "3460",
    "ISUM 8522",
    3,
    array(
        new DayModel("lunes", HoursT::convertToHours("18:15"), HoursT::convertToHours("19:44")),
        new DayModel("jueves", HoursT::convertToHours("20:30"), HoursT::convertToHours("21:59"))
    ),
    "Ingeneria de Sistemas",
    "Mañana",
    "Presencial");
SubjectModel::registerSubject($arq);

$arq2 = new SubjectModel(
    "Arquitectura de Software",
    "8213",
    "ISUM 8522",
    3,
    array(
        new DayModel("lunes", HoursT::convertToHours("20:30"), HoursT::convertToHours("21:59")),
        new DayModel("jueves", HoursT::convertToHours("18:15"), HoursT::convertToHours("19:44"))
    ),
    "Ingeneria de Sistemas",
    "Mañana",
    "Presencial");
SubjectModel::registerSubject($arq2);

$arq3 = new SubjectModel(
    "Arquitectura de Software",
    "8217",
    "ISUM 8522",
    3,
    array(
        new DayModel("miercoles", HoursT::convertToHours("20:30"), HoursT::convertToHours("21:59")),
        new DayModel("viernes", HoursT::convertToHours("18:15"), HoursT::convertToHours("19:44"))
    ),
    "Ingeneria de Sistemas",
    "Mañana",
    "Presencial");
SubjectModel::registerSubject($arq3);

$arq4 = new SubjectModel(
    "Arquitectura de Software",
    "11602",
    "ISUM 8522",
    3,
    array(
        new DayModel("miercoles", HoursT::convertToHours("18:15"), HoursT::convertToHours("19:44")),
        new DayModel("sabado", HoursT::convertToHours("20:30"), HoursT::convertToHours("21:59"))
    ),
   "Ingeneria de Sistemas",
    "Mañana",
    "Presencial");
SubjectModel::registerSubject($arq4);
/************************ARQUITECTURA DE SOFTWARE********************************************/

/************************BASES DE DATOS MASIVAS********************************************/

$bdm = new SubjectModel(
    "Bases de datos masivas",
    "3468",
    "ISUM 8522",
    3,
    array(
        new DayModel("martes", HoursT::convertToHours("18:15"), HoursT::convertToHours("19:44")),
        new DayModel("sabado", HoursT::convertToHours("21:15"), HoursT::convertToHours("21:59"))
    ),
    "Ingeneria de Sistemas",
    "Mañana",
    "Presencial");
SubjectModel::registerSubject($bdm);

$bdm2 = new SubjectModel(
    "Bases de datos masivas",
    "13811",
    "ISUM 8522",
    3,
    array(
        new DayModel("martes", HoursT::convertToHours("20:30"), HoursT::convertToHours("21:59")),
        new DayModel("viernes", HoursT::convertToHours("18:15"), HoursT::convertToHours("19:44"))
    ),
    "Ingeneria de Sistemas",
    "Mañana",
    "Presencial");
SubjectModel::registerSubject($bdm2);

/************************BASES DE DATOS MASIVAS********************************************/

/************************ ECUACIONES DIFERENCIALES******************************************/

$dif = new SubjectModel(
    "Ecuaciones Diferenciales",
    "3906",
    "ISUM 8522",
    3,
    array(
        new DayModel("martes", HoursT::convertToHours("20:30"), HoursT::convertToHours("21:59")),
        new DayModel("viernes", HoursT::convertToHours("20:30"), HoursT::convertToHours("21:59"))
    ),
    "Ingeneria de Sistemas",
    "Noche",
    "Presencial");
SubjectModel::registerSubject($dif);

/*******************************************************************************************/

/*****************************EDIS**********************************************************/
$edis = new SubjectModel(
    "Estructuras de internet Redes y Servidores",
    "3463",
    "ISUM 8522",
    3,
    array(
        new DayModel("martes", HoursT::convertToHours("18:15"), HoursT::convertToHours("19:44")),
        new DayModel("jueves", HoursT::convertToHours("20:30"), HoursT::convertToHours("21:59"))
    ),
    "Ingeneria de Sistemas",
    "Mañana",
    "Presencial");
SubjectModel::registerSubject($edis);
/***************************************************************************************************************/

var_dump($_SESSION['subjects']);

die();