<?php namespace Proyect\src\models;

require_once '../src/config/database.php';

/**
 * Class BaseModel
 * Skeleton class for the other classes
 * @author Adrian Hoyos
 */
class BaseModel {

    protected $id;
    protected $db;

    public function __construct()
    {
        $this->db = database::connect();
    }

    /*Getters and Setters*/
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getDb()
    {
        return $this->db;
    }


}