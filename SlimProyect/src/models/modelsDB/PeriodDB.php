<?php namespace Proyect\src\models\modelsDB;

use Exception;
use Proyect\src\config\Database;
use Proyect\src\models\PeriodModel;

class PeriodDB implements CRUD
{

    public static function getAll()
    {
        try {
            $periods = array();
            $conn = Database::getConnection();
            $stmt = $conn->query("SELECT id_periodos, nombre FROM PERIODOS");

            while ($row = $stmt->fetch()){
                $period = new PeriodModel();
                $period->setId($row['id_periodos']);
                $period->setName($row['nombre']);
                array_push($periods, $period);
            }
            $conn = null;//Close connection
            return $periods;
        }catch (Exception $e){echo $e->getMessage();}
    }

    public function getById($id)
    {

    }

    public function update($object)
    {
        // TODO: Implement update() method.
    }

    public function delete($object)
    {
        // TODO: Implement delete() method.
    }


}