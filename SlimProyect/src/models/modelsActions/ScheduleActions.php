<?php namespace Proyect\src\models\modelsActions;

use Proyect\src\models\modelsActions\HoursActions;

class ScheduleActions
{
    /**
     * Function to generate an empty board
     * @param $startHour Start of board
     * @param $finalHour End of board
     * @return array Empty board with name of days
     */
    public static function generateBoard($startHour, $finalHour)//Ptivate Method
    {
        $range = self::generateRange($startHour, $finalHour);//Range of hours
        $emptySchedule = array();

        for ($i = 0; $i < count($range); $i++) {
            if($i == 0){
                array_push($emptySchedule, array("hora","lunes", "martes", "miercoles", "jueves", "viernes", "sabado", "virtual"));//Introducing names of days
            }else{
                array_push($emptySchedule, array($range[$i]->format('H:i'), null, null, null, null, null, null, null));
            }
        }
        return $emptySchedule;
    }

    /**
     * Function to generate a range of hours
     * @param $startHour start of range
     * @param $finalHour end of range
     */
    private static function generateRange($startHour, $finalHour){

        $range = array();
        $startHourRange = HoursActions::convertToHours($startHour);
        $finalHourRange = HoursActions::convertToHours($finalHour);

        while ($startHourRange < $finalHourRange) {
            array_push($range, $startHourRange);
            $startHourRange = (clone $startHourRange)->modify('+14 minutes');
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