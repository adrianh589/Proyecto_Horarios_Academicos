<?php

require_once 'BaseModel.php';

/**
 * Class NrcModel
 * @author Adrian Hoyos
 */
class NrcModel extends BaseModel {

    private $nrc;

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




}
