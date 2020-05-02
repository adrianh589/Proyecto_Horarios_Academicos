<?php

/**
 * Class SheduleController
 * @author Adrian Hoyos
 */
class SheduleController {

    public static function generatePosibilities()
    {
        require_once 'models/ScheduleModel.php.php';//Load model
        $result = ScheduleModel::generatePosibilities();//Controller action logic
        return $result;//Send result to route
    }

}