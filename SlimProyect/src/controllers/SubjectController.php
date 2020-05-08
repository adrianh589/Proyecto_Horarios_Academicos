<?php namespace Proyect\src\controllers;

/**
 * Class SubjectController
 * @author Adrian Hoyos
 */
class SubjectController {

    public static function test()
    {
        //Load model
        require_once "../src/models/SubjectModel.php";

        //Load matters for test
        require_once '../src/test_subjects/test_subjects.php';

        //view
        require_once '../src/views/subject/test.php';

        return $result;
    }

}