<?php namespace Proyect\src\models;

class ProgramModel extends BaseModel {

    private $name;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }



}