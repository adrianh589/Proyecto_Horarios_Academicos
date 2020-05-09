<?php namespace Proyect\src\controllers;

use Proyect\src\models\modelsActions\ScheduleActions;

/**
 * Class ScheduleController
 * @author Adrian Hoyos
 */
class ScheduleController {

    public static function generateAcademicsSchedules()
    {
        require_once '../src/models/ScheduleModel.php';//Load model
        require_once '../src/models/modelsActions/ScheduleActions.php';//Load Actions
        $result = ScheduleActions::generateBoard("18:15","21:59");//Controller action logic
        return $result;//Send result to route
    }

}