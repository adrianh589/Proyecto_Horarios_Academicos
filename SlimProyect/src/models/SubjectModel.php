<?php namespace Proyect\src\models;

use JsonSerializable;

/**
 * Class SubjectModel
 * @author Adrian Hoyos
 */
class SubjectModel extends BaseModel implements JsonSerializable
{
    private $name;
    private $nrc;
    private $alfanumeric;
    private $credits;
    private $days = array();
    private $program;
    private $workday;
    private $modality;
    private $faculty;
    private $description;

    public function __construct($name = null, $nrc = null, $alfanumeric = null, $credits = null, $days = null, $program = null, $workday = null, $modality = null, $faculty = null, $description = null)
    {
        $this->setName($name);
        $this->setNrc($nrc);
        $this->setAlfanumeric($alfanumeric);
        $this->setCredits($credits);
        $this->setDays($days);
        $this->setProgram($program);
        $this->setWorkday($workday);
        $this->setModality($modality);
        $this->setFaculty($faculty);
        $this->setDescription($description);
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
        $array = array();
        for ($i = 0; $i < count($this->days); $i++) {

            array_push($array,

                array
                (
                    "name" => $this->days[$i]->getName(),
                    "start_hour" => $this->days[$i]->getstartHour()->format('H:i'),
                    "final_hour" => $this->days[$i]->getfinalHour()->format('H:i')
                )

            );
        }
        return $array;
    }

    public function setDays($days)//Receives array of DayModels
    {
        for ($i = 0; $i < count($days); $i++) {
            array_push($this->days, $days[$i]);
        }
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

    public function getFaculty()
    {
        return $this->faculty;
    }

    public function setFaculty($faculty)
    {
        $this->faculty = $faculty;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function jsonSerialize()
    {
        return array(
            "name"          => $this->getName()         ,
            "nrc"           => $this->getNrc()          ,
            "alfanumeric"   => $this->getAlfanumeric()  ,
            "credits"       => $this->getCredits()      ,
            "days"          => $this->getDays()         ,
            "program"       => $this->getProgram()      ,
            "workday"       => $this->getWorkday()      ,
            "modality"      => $this->getModality()     ,
            "faculty"       => $this->getFaculty()      ,
            "description"   => $this->getDescription()
        );
    }
}