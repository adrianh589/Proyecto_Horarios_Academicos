<?php namespace Proyect\src\models\modelsActions;

use DateTime;

class HoursActions {

    /**
     * Function to convert String to DateTime hour
     * @param $hour
     * @return mixed
     */
    public static function convertToHours(string $hour)
    {
        $hour = DateTime::createFromFormat('!H:i',$hour);
        $hour->format('H:i');
        return $hour;
    }

    /**
     * Function that indicates if an hour is between range VERIFICAR
     * @param $hourBoard    Hour in String
     * @param $startHour    Hour in String
     * @param $finalHour    Hour in String
     * @return bool         True if the hour is between the range otherwise false
     */
    public static function betweenRange($hourBoard, $startHour, $finalHour)
    {
        $hourBoard = HoursActions::convertToHours($hourBoard);
        $startHour = HoursActions::convertToHours($startHour);
        $finalHour = HoursActions::convertToHours($finalHour);
        return $hourBoard >= $startHour && $hourBoard <= $finalHour;
    }

    /**
     * Function to generate a range of hours
     * @param $startHour start of range
     * @param $finalHour end of range
     * @return array
     */
    public static function generateRange($startHour, $finalHour)
    {

        $range = array();
        $startHourRange = self::convertToHours($startHour);
        $finalHourRange = self::convertToHours($finalHour);

        while ($startHourRange < $finalHourRange) {
            array_push($range, $startHourRange);
            $startHourRange = (clone $startHourRange)->modify('+14 minutes');
            array_push($range, $startHourRange);
            $startHourRange = (clone $startHourRange)->modify('+1 minutes');
        }
        return $range;
    }

}