<?php

require_once 'BaseModel.php';


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