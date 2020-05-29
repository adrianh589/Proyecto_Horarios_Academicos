<?php namespace Proyect\src\controllers;

use Proyect\src\models\modelsActions\ScheduleActions;

/**
 * Class ScheduleController
 * @package Proyect\src\controllers
 * @author Adrian Hoyos
 */
class ScheduleController {

    public static function generateAcademicSchedules()
    {
        require_once '../src/models/modelsActions/ScheduleActions.php';//Load Actions
        $schedules = ScheduleActions::generateAcademicSchedules();//Controller action logic
        require_once '../src/views/schedule/generateAcademicSchedules.php';//Send to view
        return $schedules;//Send result to route
    }

}