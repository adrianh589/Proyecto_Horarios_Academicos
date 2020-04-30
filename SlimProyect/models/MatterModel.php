<?php

require_once 'BaseModel.php';

class MatterModel extends BaseModel {

    private $name;
    private $alfanumeric;
    private $days;
    private $credits;
    private $modality;

    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getAlfanumeric()
    {
        return $this->alfanumeric;
    }

    /**
     * @param mixed $alfanumeric
     */
    public function setAlfanumeric($alfanumeric)
    {
        $this->alfanumeric = $alfanumeric;
    }

    /**
     * @return mixed
     */
    public function getDays()
    {
        return $this->days;
    }

    /**
     * @param mixed $days
     */
    public function setDays($days)
    {
        $this->days = $days;
    }

    /**
     * @return mixed
     */
    public function getCredits()
    {
        return $this->credits;
    }

    /**
     * @param mixed $credits
     */
    public function setCredits($credits)
    {
        $this->credits = $credits;
    }

    /**
     * @return mixed
     */
    public function getModality()
    {
        return $this->modality;
    }

    /**
     * @param mixed $modality
     */
    public function setModality($modality)
    {
        $this->modality = $modality;
    }

    public function consultByProgram()
    {

    }

    public function saveMatters()
    {

    }


}