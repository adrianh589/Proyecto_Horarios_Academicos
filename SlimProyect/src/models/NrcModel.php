<?php

  namespace Horarios\Model;


  /**
   * Class NrcModel
   * @package Horarios\Model
   * @author Adrian Hoyos
   */
  class NrcModel implements \JsonSerializable
  {

    private $nrc;

    public function __construct()
    {

    }

    public function getNrc()
    {
      return $this->nrc;
    }

    public function setNrc($nrc)
    {
      $this->nrc = $nrc;
    }

    public function jsonSerialize()
    {
      return get_object_vars($this);
    }


  }
