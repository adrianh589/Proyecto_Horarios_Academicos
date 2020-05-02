<?php

require_once 'BaseModel.php';

/**
 * Class MatterModel
 * @author Adrian Hoyos
 */
class MatterModel extends BaseModel {

    use HoursT;//Trait HoursT

    private $nrc;
    private $alfanumeric;
    private $name;
    private $credits;
    private $days = array();
    private $program;
    private $workday;
    private $modality;

    public function __construct()
    {

    }

    public function getNrc()
    {
        return $this->nrc;
    }

    public function setNrc($nrc)
    {
        $this->nrc = $nrc;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getAlfanumeric()
    {
        return $this->alfanumeric;
    }

    public function setAlfanumeric($alfanumeric)
    {
        $this->alfanumeric = $alfanumeric;
    }

    public function getDays()
    {
        return $this->days;
    }

    public function setDays(DayModel $days)
    {
        array_push($this->days, $days);
    }

    public function getCredits()
    {
        return $this->credits;
    }

    public function setCredits($credits)
    {
        $this->credits = $credits;
    }

    public function getModality()
    {
        return $this->modality;
    }

    public function setModality($modality)
    {
        $this->modality = $modality;
    }

    public function getProgram()
    {
        return $this->program;
    }

    public function setProgram($program)
    {
        $this->program = $program;
    }

    public function getWorkday()
    {
        return $this->workday;
    }

    public function setWorkday($workday)
    {
        $this->workday = $workday;
    }

    public function consultByProgram()
    {

    }

    public function saveMatters()
    {

    }


}