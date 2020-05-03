<?php

  namespace Horarios\Model;


  /**
   * Class ProgramModel
   * @package Horarios\Model
   */
  class ProgramModel implements \JsonSerializable
  {

    private $name;

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