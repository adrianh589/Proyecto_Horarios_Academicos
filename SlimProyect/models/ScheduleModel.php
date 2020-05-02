<?php

require_once 'BaseModel.php';
require_once 'HoursT.php';

class ScheduleModel extends BaseModel {

    use HoursT;//Trait for hours

    /**
     * Generate the model of the schedule in a specific range.
     * @param $startHour
     * @param $finalHour
     */
    public function generateShedule($startHour, $finalHour)
    {

    }

    public static function generatePosibilities()
    {

    }

    public function saveShedules()
    {
        
    }

    public function deleteShedules()
    {
        
    }

    public function createShedule()
    {

    }

}