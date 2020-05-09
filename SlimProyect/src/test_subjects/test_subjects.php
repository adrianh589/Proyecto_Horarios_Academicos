<?php

use Proyect\src\models\SubjectModel;
use Proyect\src\models\DayModel;
use Proyect\src\models\modelsActions\SubjectActions;
use Proyect\src\models\modelsActions\HoursActions;


/************************ARQUITECTURA DE SOFTWARE********************************************/

$arq = new SubjectModel(
    "Arquitectura de Software",
    "3460",
    "ISUM 8522",
    3,
    array(
        new DayModel("lunes", HoursActions::convertToHours("18:15"), HoursActions::convertToHours("19:44")),
        new DayModel("jueves", HoursActions::convertToHours("20:30"), HoursActions::convertToHours("21:59"))
    ),
    "Ingeneria de Sistemas",
    "Mañana",
    "Presencial");
SubjectActions::saveSubject($arq);

$arq2 = new SubjectModel(
    "Arquitectura de Software",
    "8213",
    "ISUM 8522",
    3,
    array(
        new DayModel("lunes", HoursActions::convertToHours("20:30"), HoursActions::convertToHours("21:59")),
        new DayModel("jueves", HoursActions::convertToHours("18:15"), HoursActions::convertToHours("19:44"))
    ),
    "Ingeneria de Sistemas",
    "Mañana",
    "Presencial");
SubjectActions::saveSubject($arq2);

$arq3 = new SubjectModel(
    "Arquitectura de Software",
    "8217",
    "ISUM 8522",
    3,
    array(
        new DayModel("miercoles", HoursActions::convertToHours("20:30"), HoursActions::convertToHours("21:59")),
        new DayModel("viernes", HoursActions::convertToHours("18:15"), HoursActions::convertToHours("19:44"))
    ),
    "Ingeneria de Sistemas",
    "Mañana",
    "Presencial");
SubjectActions::saveSubject($arq3);

$arq4 = new SubjectModel(
    "Arquitectura de Software",
    "11602",
    "ISUM 8522",
    3,
    array(
        new DayModel("miercoles", HoursActions::convertToHours("18:15"), HoursActions::convertToHours("19:44")),
        new DayModel("sabado", HoursActions::convertToHours("20:30"), HoursActions::convertToHours("21:59"))
    ),
   "Ingeneria de Sistemas",
    "Mañana",
    "Presencial");
SubjectActions::saveSubject($arq4);
/************************ARQUITECTURA DE SOFTWARE********************************************/

/************************BASES DE DATOS MASIVAS********************************************/

$bdm = new SubjectModel(
    "Bases de datos masivas",
    "3468",
    "ISUM 8522",
    3,
    array(
        new DayModel("martes", HoursActions::convertToHours("18:15"), HoursActions::convertToHours("19:44")),
        new DayModel("sabado", HoursActions::convertToHours("21:15"), HoursActions::convertToHours("21:59"))
    ),
    "Ingeneria de Sistemas",
    "Mañana",
    "Presencial");
SubjectActions::saveSubject($bdm);

$bdm2 = new SubjectModel(
    "Bases de datos masivas",
    "13811",
    "ISUM 8522",
    3,
    array(
        new DayModel("martes", HoursActions::convertToHours("20:30"), HoursActions::convertToHours("21:59")),
        new DayModel("viernes", HoursActions::convertToHours("18:15"), HoursActions::convertToHours("19:44"))
    ),
    "Ingeneria de Sistemas",
    "Mañana",
    "Presencial");
SubjectActions::saveSubject($bdm2);

/************************BASES DE DATOS MASIVAS********************************************/

/************************ ECUACIONES DIFERENCIALES******************************************/

$dif = new SubjectModel(
    "Ecuaciones Diferenciales",
    "3906",
    "ISUM 8522",
    3,
    array(
        new DayModel("martes", HoursActions::convertToHours("20:30"), HoursActions::convertToHours("21:59")),
        new DayModel("viernes", HoursActions::convertToHours("20:30"), HoursActions::convertToHours("21:59"))
    ),
    "Ingeneria de Sistemas",
    "Noche",
    "Presencial");
SubjectActions::saveSubject($dif);

/*******************************************************************************************/

/*****************************EDIS**********************************************************/
$edis = new SubjectModel(
    "Estructuras de internet Redes y Servidores",
    "3463",
    "ISUM 8522",
    3,
    array(
        new DayModel("martes", HoursActions::convertToHours("18:15"), HoursActions::convertToHours("19:44")),
        new DayModel("jueves", HoursActions::convertToHours("20:30"), HoursActions::convertToHours("21:59"))
    ),
    "Ingeneria de Sistemas",
    "Mañana",
    "Presencial");
SubjectActions::saveSubject($edis);
/***************************************************************************************************************/

if (session_destroy()) {
    //echo "Sesión destruida correctamente";
} else {
    echo "Error al destruir la sesión";
}