<?php

/**
 * Class MatterController
 * @author Adrian Hoyos
 */
class MatterController {

    public static function test()
    {
        require_once '../models/MatterModel.php';//Load model
        $matter = new MatterModel();
        $matter->setNrc("3460");
        $matter->setName("Arquitectura de Software");
        $matter->setModality("Presencial");
        $matter->setWorkday("Tarde");
        var_dump($matter);

        return $matter;

    }

}