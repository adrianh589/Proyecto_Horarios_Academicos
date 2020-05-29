<?php namespace Proyect\src\models;

use JsonSerializable;

/**
 * Class PeriodModel
 * @package Proyect\src\models
 */
class PeriodModel implements JsonSerializable {

    private $id;
    private $name;

    /*Getters and setters*/
    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }


    public function jsonSerialize()
    {
        return array(
            "id"    => $this->getId()   ,
            "name"  => $this->getName()
        );
    }
}
