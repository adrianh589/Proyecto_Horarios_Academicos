<?php namespace Proyect\src\controllers;

use Proyect\src\models\modelsActions\ScheduleActions;//Load model actions

/**
 * Class ScheduleController
 * @package Proyect\src\controllers
 * @author Adrian Hoyos
 */
class ScheduleController {

    /**
     * Function to generate all academics schedules
     * @return array
     */
    public static function generateAcademicSchedules()
    {
        $schedules = ScheduleActions::generateAcademicSchedules();//Controller action logic
        require_once '../src/views/schedule/generateAcademicSchedules.php';//Send to view
        return $schedules;//Send result to route
    }

}