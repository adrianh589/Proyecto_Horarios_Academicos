<?php

require_once '../config/database.php';

class BaseModel {

    protected $id;
    protected $db;

    public function __construct()
    {
        $this->db = database::connect();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * get DataBase
     * @return mysqli Object
     */
    public function getDb()
    {
        return $this->db;
    }

    public function consultAll()
    {
        
    }



}