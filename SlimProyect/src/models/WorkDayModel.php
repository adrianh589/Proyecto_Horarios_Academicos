<?php

  namespace Horarios\Model;


  /**
   * Class WorkDayModel
   * @package Horarios\Model
   */
  class WorkDayModel implements \JsonSerializable
  {
    private $name;

    /**
     * @return mixed
     */
    public function getName()
    {
      return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
      $this->name = $name;
    }

    public function jsonSerialize()
    {
      return get_object_vars($this);
    }


  }
