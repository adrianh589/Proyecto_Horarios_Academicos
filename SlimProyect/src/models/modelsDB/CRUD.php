<?php namespace Proyect\src\models\modelsDB;

interface CRUD {
    public function getById($id);
    public function getAll();
    public function update($object);
    public function delete($object);
}