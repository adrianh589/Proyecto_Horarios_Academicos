<?php

require_once 'BaseModel.php';
require_once 'HoursT.php';

class DayModel extends BaseModel {

    use HoursT;//Trait for hours

    private $name;

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

}

$day = new DayModel();