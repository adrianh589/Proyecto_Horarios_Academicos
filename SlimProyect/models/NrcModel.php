<?php

require_once 'BaseModel.php';

class NrcModel extends BaseModel {

    private $nrc;

    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getNrc()
    {
        return $this->nrc;
    }

    /**
     * @param mixed $nrc
     */
    public function setNrc($nrc)
    {
        $this->nrc = $nrc;
    }




}
