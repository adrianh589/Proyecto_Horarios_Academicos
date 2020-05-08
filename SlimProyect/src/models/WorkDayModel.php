<?php namespace Proyect\src\models;

class WorkDayModel extends BaseModel {

    private $name;

    public function __construct($name = null)
    {
        $this->setName($name);
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

}
