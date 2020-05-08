<?php namespace Proyect\src\models\traits;

use DateTime;

/**
 * Trait HoursT
 * @author Adrian Hoyos
 */
trait HoursT {

    private $startHour;
    private $finalHour;

    public function __construct($startHour, $finalHour){
        $this->startHour = $startHour;
        $this->finalHour = $finalHour;
    }

    /*Getters and Setters*/
    public function getStartHour(){
        return $this->startHour;
    }

    public function setStartHour($startHour){
        $this->startHour = $startHour;
    }

    public function getFinalHour(){
        return $this->finalHour;
    }

    public function setFinalHour($finalHour){
        $this->finalHour = $finalHour;
    }

    public static function convertToHours($hour){
        $hour = DateTime::createFromFormat('!H:i',$hour);
        $hour->format('H:i');
        return $hour;
    }

}