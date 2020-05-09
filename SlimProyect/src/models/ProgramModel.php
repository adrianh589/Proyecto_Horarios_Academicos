<?php namespace Proyect\src\models;

class ProgramModel extends BaseModel {

    private $name;
 //Create an object and return the result, easy
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