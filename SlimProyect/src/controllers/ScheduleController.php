<?php namespace Proyect\src\controllers;

use Proyect\src\models\modelsActions\ScheduleActions;

/**
 * Class ScheduleController
 * @author Adrian Hoyos
 */
class ScheduleController {

    public static function generateAcademicSchedules()
    {
        require_once '../src/models/ScheduleModel.php';//Load model
        require_once '../src/models/modelsActions/ScheduleActions.php';//Load Actions
        $result = ScheduleActions::generateAcademicSchedules();//Controller action logic
        //Send to view
        return $result;//Send result to route
    }

}