<?php namespace Proyect\src\models\modelsDB;

interface CRUD {
    public static function getAll();
    public static function getBy($parameter);
    public static function delete($parameter);
}