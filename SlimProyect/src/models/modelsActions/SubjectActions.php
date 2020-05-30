<?php namespace Proyect\src\models\modelsActions;

use Proyect\src\models\SubjectModel;

/**
 * Class SubjectActions
 * @package Proyect\src\models\modelsActions
 * @author Adrian Hoyos
 */
class SubjectActions
{
    /**
     * Function to classify a subject in the server,
     * the subjects must have the same name to be classified
     * @param SubjectModel $subject Receives a subject object
     */
    public static function saveSubjectInSession(SubjectModel $subject)
    {
        $found = false;

        if(self::createSession("subjects")) {//Initialize an array in the session
            array_push($_SESSION['subjects'], array($subject));
            //$_SESSION['subjects'] = array(array($subject));
        }else {

            for ($i = 0; $i < count($_SESSION['subjects']); $i++) {
                if ($_SESSION['subjects'][$i][0]->getName() === $subject->getName()) {
                    array_push($_SESSION['subjects'][$i], $subject);
                    $found = true;
                    break;
                }
            }

            if ($found == false) {
                array_push($_SESSION['subjects'], array($subject));
            }
        }
    }

    /**
     * Function to create a session
     */
    public static function createSession($nameofsession)
    {
        self::sessionStart();
        if(!isset($_SESSION["{$nameofsession}"])){
            $_SESSION["{$nameofsession}"] = array();
            return true;
        }
        return false;
    }

    /**
     * Function to destroy the session of subjects
     */
    public static function destroySession($nameofsession)
    {
        //Destroy the session if exists
        self::sessionStart();
        if( isset($_SESSION["{$nameofsession}"]) ){
            unset($_SESSION["{$nameofsession}"] );
        }
    }

    /**
     * Function to start session if not exists
     */
    public static function sessionStart()
    {
        if( session_status() == PHP_SESSION_NONE  ) {//If the session not exists
            session_start();
        }
    }


}