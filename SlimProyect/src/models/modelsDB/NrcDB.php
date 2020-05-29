<?php namespace Proyect\src\models\modelsDB;

use Exception;
use Proyect\src\config\Database;
use Proyect\src\models\NrcModel;

class NrcDB implements CRUD{

    /**
     * Get all nrcs
     * @return array With all nrcs
     */
    public static function getAll()
    {
        $nrcs = array();
        try {
            $conn = Database::getConnection();
            $stmt = $conn->query("SELECT id_nrcs FROM NRCS;");

            while ($row = $stmt->fetch()){
                $nrc = new NrcModel();
                $nrc->setNumber($row['id_nrcs']);
                array_push($nrcs, $nrc);
            }
            $conn = null;//Close connection
        }catch (Exception $e){echo $e->getMessage();}
        return $nrcs;
    }

    /**
     * Get nrc by id
     * @param $id
     * @return mixed
     */
    public static function getById($id)
    {
        $nrc = new NrcModel();
        try {
            $conn = Database::getConnection();
            $stmt = $conn->query(" SELECT id_nrcs FROM NRCS WHERE id_nrcs = $id;");

            if ($row = $stmt->fetch($conn::FETCH_ASSOC)){
                $nrc->setNumber($row['id_nrcs']);
            }else{
                return array("message" => "This id does not exists");
            }

            $conn = null;//Close connection
        }catch (Exception $e){echo $e->getMessage();}
        return $nrc;
    }

    /**
     * Delete a nrc by id
     */
    public static function delete($id)
    {
        $status = false;
        try {
            $conn = Database::getConnection();
            $status = $stmt = $conn->exec("DELETE FROM NRCS WHERE id_nrcs = '$id'");
            $conn = null;//Close connection
        }catch (Exception $e){echo $e->getMessage();}
        return $status;
    }
}