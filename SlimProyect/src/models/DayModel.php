<?php namespace Proyect\src\models;

use JsonSerializable;
use Proyect\src\models\traits\HoursT;

/**
 * Class DayModel
 * @package Proyect\src\models
 * @author Adrian Hoyos
 */
class DayModel implements JsonSerializable {

    use HoursT;//Trait for hours

    private $id;
    private $name;

    /*Getters and Setters*/

    public function getId()
    {
        return $this->id;
    }

    public function setId($id = null): void
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name = null)
    {
        $this->name = $name;
    }

    public function jsonSerialize()
    {
       return array(
           "id"         => $this->getId()       ,
           "name"       => $this->getName()     ,
           "start_hour" => $this->getStartHour()->format('H:i'),
           "final_hour" => $this->getFinalHour()->format('H:i')
       );
    }
}