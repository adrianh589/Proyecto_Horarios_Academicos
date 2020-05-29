<?php namespace Proyect\src\models;

use JsonSerializable;

/**
 * Class SemesterModel
 * @package Proyect\src\models
 * @author Adrian Hoyos
 */
class SemesterModel implements JsonSerializable
{

    private $semester;

    public function getSemester()
    {
        return $this->semester;
    }

    public function setSemester($semester): void
    {
        $this->semester = $semester;
    }

    public function jsonSerialize()
    {
        return array(
          "semester" => $this->getSemester()
        );
    }
}