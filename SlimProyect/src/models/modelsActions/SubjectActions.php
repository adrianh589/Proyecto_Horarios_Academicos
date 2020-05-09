<?php namespace Proyect\src\models\modelsActions;

use Proyect\src\models\SubjectModel;

class SubjectActions
{
    /**
     * Function to classify a subject in the server,
     * the subjects must have the same name to be classified
     * @param SubjectModel $subject Receives a subject object
     */
    public static function saveSubject(SubjectModel $subject)
    {
        if( !isset($_SESSION['subjects']) ) {//If the session not exists
            session_start();
        }

        $found = false;

        if(!isset($_SESSION['subjects'])) {//Initialize an array in the session
            $_SESSION['subjects'] = array(array($subject));
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

}