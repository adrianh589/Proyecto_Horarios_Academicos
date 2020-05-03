<?php

  namespace Horarios\Model;


  /**
   * Class DayModel
   * @package Horarios\Model
   * @author Adrian Hoyos
   */
  class DayModel implements \JsonSerializable
  {

    use HoursT;

    //Trait for hours

    private $name;

    public function __construct($name, $startHour, $finalHour)
    {
      $this->setName($name);
      $this->setStartHour($startHour);
      $this->setfinalHour($finalHour);
    }

    /*Getters and Setters*/
    public function getName()
    {
      return $this->name;
    }

    public function setName($name)
    {
      $this->name = $name;
    }

    public function jsonSerialize()
    {
      return get_object_vars($this);
    }

  }