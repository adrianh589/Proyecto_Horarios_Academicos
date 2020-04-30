<?php

/**
 * Trait HoursT
 * @author Adrian Hoyos
 */
trait HoursT {

    protected $startHour;
    protected $finalHour;

    public function __construct($startHour, $finalHour){
        $this->startHour = $startHour;
        $this->finalHour = $finalHour;
    }

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

}