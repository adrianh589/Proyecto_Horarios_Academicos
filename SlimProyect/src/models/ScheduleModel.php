<?php

  namespace Horarios\Model;


  /**
   * Class ScheduleModel
   * @package Horarios\Model
   */
  class ScheduleModel implements \JsonSerializable
  {

    use HoursT;

    //Trait for hours

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

    public function jsonSerialize()
    {
      return get_object_vars($this);
    }

  }