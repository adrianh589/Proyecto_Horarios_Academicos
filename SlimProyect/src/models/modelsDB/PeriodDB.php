<?php namespace Proyect\src\models\modelsDB;

use Exception;
use Proyect\src\config\Database;
use Proyect\src\models\PeriodModel;

class PeriodDB implements CRUD
{

    public static function getAll()
    {
        $periods = array();
        try {
            $conn = Database::getConnection();
            $stmt = $conn->query("SELECT id_periodos, nombre FROM PERIODOS");

            while ($row = $stmt->fetch()){
                $period = new PeriodModel();
                $period->setId($row['id_periodos']);
                $period->setName($row['nombre']);
                array_push($periods, $period);
            }
            $conn = null;//Close connection

        }catch (Exception $e){echo $e->getMessage();}
        return $periods;
    }

    /**
     * Get period by id
     * @param $id
     * @return mixed
     */
    public static function getById($id)
    {
        $period = new PeriodModel();
        try {
            $conn = Database::getConnection();
            $stmt = $conn->query(" SELECT id_periodos, nombre  FROM PERIODOS WHERE id_periodos = $id;");

            if ($row = $stmt->fetch($conn::FETCH_ASSOC)){
                $period->setId($row['id_periodos']);
                $period->setName($row['nombre']);
            }else{
                return array("message" => "This id does not exists");
            }

            $conn = null;//Close connection
        }catch (Exception $e){echo $e->getMessage();}
        return $period;
    }

    /**
     * Delete a nrc by id
     */
    public static function delete($id)
    {
        $status = false;
        try {
            $conn = Database::getConnection();
            $status = $stmt = $conn->exec("DELETE FROM PERIODOS WHERE id_periodos = $id");
            $conn = null;//Close connection
        }catch (Exception $e){echo $e->getMessage();}
        return $status;
    }


}