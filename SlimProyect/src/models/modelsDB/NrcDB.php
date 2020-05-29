<?php namespace Proyect\src\models\modelsDB;

use Proyect\src\config\Database;
use Proyect\src\models\NrcModel;

class NrcDB implements CRUD{


    public static function getAll()
    {
        try {
            $nrcs = array();
            $conn = Database::getConnection();
            $stmt = $conn->query("SELECT id_nrcs FROM NRCS;");

            while ($row = $stmt->fetch()){
                $nrc = new NrcModel();
                $nrc->setNumber($row['id_nrcs']);
                array_push($nrcs, $nrc);
            }
            $conn = null;//Close connection
            return $nrcs;
        }catch (Exception $e){echo $e->getMessage();}
    }
}