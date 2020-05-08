<?php

use Proyect\src\models\SubjectModel;
use Proyect\src\models\DayModel;
use Proyect\src\models\traits\HoursT;

$subjects = array();

/*Variables para convertir a horas*/

/************************ARQUITECTURA DE SOFTWARE********************************************/


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
array_push($subjects, $arq2);

$arq3 = new SubjectModel(
    "Arquitectura de Software",
    "8213",
    "ISUM 8522",
    3,
    array(
        new DayModel("miercoles", HoursT::convertToHours("20:30"), HoursT::convertToHours("21:59")),
        new DayModel("viernes", HoursT::convertToHours("18:15"), HoursT::convertToHours("19:44"))
    ),
    "Ingeneria de Sistemas",
    "Mañana",
    "Presencial");
array_push($subjects, $arq3);

$arq4 = new SubjectModel(
    "Arquitectura de Software",
    "12345",
    "ISUM 8522",
    3,
    array(
        new DayModel("miercoles", HoursT::convertToHours("18:15"), HoursT::convertToHours("19:44")),
        new DayModel("sabado", HoursT::convertToHours("20:30"), HoursT::convertToHours("21:59"))
    ),
    "Ingeneria de Sistemas",
    "Mañana",
    "Presencial");
array_push($subjects, $arq4);
/************************ARQUITECTURA DE SOFTWARE********************************************/

/************************BASES DE DATOS MASIVAS********************************************/

$bdm = new SubjectModel(
    "Bases de datos masivas",
    "12345",
    "ISUM 8522",
    3,
    array(
        new DayModel("martes", HoursT::convertToHours("18:15"), HoursT::convertToHours("19:44")),
        new DayModel("sabado", HoursT::convertToHours("21:15"), HoursT::convertToHours("21:59"))
    ),
    "Ingeneria de Sistemas",
    "Mañana",
    "Presencial");
array_push($subjects, $bdm);

$bdm2 = new SubjectModel(
    "Bases de datos masivas",
    "12345",
    "ISUM 8522",
    3,
    array(
        new DayModel("martes", HoursT::convertToHours("20:30"), HoursT::convertToHours("21:59")),
        new DayModel("viernes", HoursT::convertToHours("18:15"), HoursT::convertToHours("19:44"))
    ),
    "Ingeneria de Sistemas",
    "Mañana",
    "Presencial");
array_push($subjects, $bdm2);

/************************BASES DE DATOS MASIVAS********************************************/

/*****************************EDIS**********************************************************/
$edis = new SubjectModel(
    "Estructuras de internet Redes y Servidores",
    "3463",
    "ISUM 8522",
    3,
    array(
        new DayModel("martes", HoursT::convertToHours("18:15"), HoursT::convertToHours("19:44")),
        new DayModel("viernes", HoursT::convertToHours("20:30"), HoursT::convertToHours("21:59"))
    ),
    "Ingeneria de Sistemas",
    "Mañana",
    "Presencial");
array_push($subjects, $edis);
/***************************************************************************************************************/