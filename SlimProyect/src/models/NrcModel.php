<?php namespace Proyect\src\models;

/**
 * Class NrcModel
 * @author Adrian Hoyos
 */
class NrcModel extends BaseModel {

    private $number;
    private $active;

    public function __construct($number = null, $active = null)
    {
        $this->setNumber($number);
        $this->setNumber($active);
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function setNumber($number)
    {
        $this->number = $number;
    }

    public function getActive()
    {
        return $this->active;
    }

    public function setActive($active)
    {
        $this->active = $active;
    }



}
