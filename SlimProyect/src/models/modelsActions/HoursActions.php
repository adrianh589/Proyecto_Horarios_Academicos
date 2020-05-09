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

}