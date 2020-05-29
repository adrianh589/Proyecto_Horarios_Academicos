<?php namespace Proyect\src\models;

use JsonSerializable;

/**
 * Class WorkdayModel
 * @package Proyect\src\models
 * @author Adrian Hoyos
 */
class WorkdayModel implements JsonSerializable {

    private $id;
    private $name;

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

    public function setName($name)
    {
        $this->name = $name;
    }

    public function jsonSerialize()
    {
        return array(
          "id"      => $this->getId(),
          "name"    => $this->getName()
        );
    }
}
