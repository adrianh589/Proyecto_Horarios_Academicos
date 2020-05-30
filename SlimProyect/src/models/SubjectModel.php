<?php namespace Proyect\src\models;

use JsonSerializable;

/**
 * Class SubjectModel
 * @package Proyect\src\models
 * @author Adrian Hoyos
 */
class SubjectModel implements JsonSerializable
{
    private $id;
    private $name;
    private $nrc;
    private $alfanumeric;
    private $credits;
    private $days = array();
    private $program;
    private $workday;
    private $semester;



//
//    public function __construct($name = null, $nrc = null, $alfanumeric = null, $credits = null, $days = null, $program = null, $workday = null){
//        $this->setName($name);
//        $this->setNrc($nrc);
//        $this->setAlfanumeric($alfanumeric);
//        $this->setCredits($credits);
//        $this->setDays($days);
//        $this->setProgram($program);
//        $this->setWorkday($workday);
//    }



    /*Getters and setters*/

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getNrc(){
        return $this->nrc;
    }

    public function setNrc($nrc){
        $this->nrc = $nrc;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getAlfanumeric(){
        return $this->alfanumeric;
    }

    public function setAlfanumeric($alfanumeric){
        $this->alfanumeric = $alfanumeric;
    }

    public function getDays(){
        $array = array();
        for ($i = 0; $i < count($this->days); $i++) {

            array_push($array,

                array
                (
                    "name"          => $this->days[$i]->getName(),
                    "start_hour"    => $this->days[$i]->getstartHour()->format('H:i'),
                    "final_hour"    => $this->days[$i]->getfinalHour()->format('H:i')
                )

            );
        }
        return $array;
    }

    /**
     * @param $days array of DayModels
     */
    public function setDays($days){
        for ($i = 0; $i < count($days); $i++) {
            array_push($this->days, $days[$i]);
        }
    }

    public function getCredits(){
        return $this->credits;
    }

    public function setCredits($credits){
        $this->credits = $credits;
    }

    public function getProgram(){
        return $this->program;
    }

    public function setProgram($program){
        $this->program = $program;
    }

    public function getWorkday(){
        return $this->workday;
    }

    public function setWorkday($workday){
        $this->workday = $workday;
    }

    public function getSemester()
    {
        return $this->semester;
    }

    public function setSemester($semester): void
    {
        $this->semester = $semester;
    }

    public function jsonSerialize(){
        return array(
            "id"            => $this->getId()           ,
            "name"          => $this->getName()         ,
            "credits"       => $this->getCredits()      ,
            "semester"      => $this->getSemester()
        );
    }

    public function jsonSerializeSemesters()
    {
        return array(
            "semester" => $this->getSemester()
        );
    }
}