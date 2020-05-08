<?php namespace Proyect\src\models;

use Proyect\src\models\traits\HoursT;
require_once '../src/models/traits/HoursT.php';


/**
 * Class DayModel
 * @author Adrian Hoyos
 */
class DayModel extends BaseModel {

    use HoursT;//Trait for hours

    private $name;

    public function __construct($name, $startHour, $finalHour)
    {
        $this->setName($name);
        $this->setStartHour($startHour);
        $this->setfinalHour($finalHour);
    }

    /*Getters and Setters*/
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

}