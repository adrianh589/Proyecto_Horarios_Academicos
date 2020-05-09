<?php namespace Proyect\src\models\modelsActions;

use Proyect\src\models\modelsActions\HoursActions;

class ScheduleActions
{
    /**
     * Function to generate an empty board
     * @param $array Receives the subjects
     */
    public static function generateBoard($startHour, $finalHour)//Ptivate Method
    {
        //Load Subjects to test
        require_once '../src/test_subjects/test_subjects.php';

        self::generateRange("18:15", "21:59");

    }

    /**
     * Function to generate a range of hours
     * @param $startHour start of range
     * @param $finalHour end of range
     */
    private static function generateRange($startHour, $finalHour)
    {
        $range = array();
        $startHourRange = HoursActions::convertToHours($startHour);
        $finalHourRange = HoursActions::convertToHours($finalHour);

        while ($startHourRange < $finalHourRange){
            array_push($range, $startHourRange);
            $startHourRange =  (clone $startHourRange)->modify('+14 minutes');
            array_push($range, $startHourRange);
            $startHourRange = (clone $startHourRange)->modify('+1 minutes');
        }
        return $range;
    }

    public static function generateAcademicsSchedules()
    {
        //Load Subjects to test
        //require_once '../src/test_subjects/test_subjects.php';

        die();
    }

    private static function clearBoard()
    {
        
    }

    private static function isCrossing()
    {
        
    }

    private function repeatedSchedule()
    {

    }

}