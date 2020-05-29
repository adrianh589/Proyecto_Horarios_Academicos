<?php namespace Proyect\src\models;

use JsonSerializable;

/**
 * Class NrcModel
 * @package Proyect\src\models
 * @author Adrian Hoyos
 */
class NrcModel implements JsonSerializable {

    private $number;

    public function getNumber()
    {
        return $this->number;
    }

    public function setNumber($number)
    {
        $this->number = $number;
    }


    public function jsonSerialize()
    {
        return array(
          "nrc" => $this->getNumber()
        );
    }
}
