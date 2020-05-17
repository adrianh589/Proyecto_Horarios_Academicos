<?php namespace Proyect\src\models\modelsActions;

use Proyect\src\models\DayModel;
use Proyect\src\models\modelsActions\HoursActions;
use Proyect\src\models\modelsActions\SubjectActions;
use Proyect\src\models\SubjectModel;

class ScheduleActions
{

    public static function generateAcademicSchedules()
    {
        SubjectActions::destroySession("schedules");        //Destroy the session if exists
        SubjectActions::createSession("schedules");         //Session to schedule
        SubjectActions::buildSubjects();                                //Test subjects, load in the $_SESSION['subjects']
        $hoursBoard = HoursActions::returnMinMaxHour();                 //
        $board = self::generateBoard($hoursBoard[0], $hoursBoard[1]);   //Automatic range
        self::buildPosibilities($board, 0, array());        //
        var_dump($_SESSION['schedules']);
        session_destroy();                                              //Unset all sessions
    }

    /**
     * Main function to generate all schedules without crossing of subjects with Backtracking method
     * @param array $board Receives a empty board
     * @param int $chosenSubject Value to choose a general subject (No sub subjects)
     * @param array $tempSubjects Empty array to temporarily store materials
     */
    private static function buildPosibilities(array $board, int $chosenSubject, array $tempSubjects): void
    {
        if ($chosenSubject == count($_SESSION['subjects'])) {//Base case

            $assign = false;            //To verify if the subject is crossing
            $chosenSchedule = array();  //Chosen schedule when all subjects have been tested
            $boardToSchedule = array(); //To check whether or not a repeated schedule has been generated

            for ($i = 0; $i < count($tempSubjects); $i++) {//Iterate on the chosen subjects

                $board = self::introduceSubjectInBoard($board, $tempSubjects[$i])[0];//Put it on the board
                array_push($chosenSchedule, $tempSubjects[$i]);//Choose the first subject to schedule

                for ($j = 0; $j < count($tempSubjects); $j++) {//Iterate over the subjects to be chosen to the chosen one
                    if ($i !== $j) {
                        $result = self::introduceSubjectInBoard($board, $tempSubjects[$j]);
                        $assign = $result[1];
                        if ($assign) {//check if it was assigned to the schedule
                            $board = $result[0];
                            array_push($chosenSchedule, $tempSubjects[$j]);
                        }
                    }
                }

                if(!self::repeatedSchedule($boardToSchedule, $board)){//Verify that it is not a repeated schedule
                    array_push($_SESSION['schedules'], $chosenSchedule);
                    echo "<h3>Horario generado</h3>";
                    self::printBoard($board);
                }

                array_push($boardToSchedule, $board);//To verify if the schedule is not repeated

                $board = self::clearBoard($board);
                $chosenSchedule = array();
                $assign = false;
            }

        } else {
            for ($subSubject = 0; $subSubject < count($_SESSION['subjects'][$chosenSubject]); $subSubject++) {
                $subject = $_SESSION['subjects'][$chosenSubject][$subSubject];
                array_push($tempSubjects, $subject);
                self::buildPosibilities($board, $chosenSubject + 1, $tempSubjects);
                array_pop($tempSubjects);
            }
        }
    }

    /**
     * Function to introduce a subject in the board
     * @param $board
     * @param $subject
     */
    private static function introduceSubjectInBoard(array $board, SubjectModel $subject): array
    {
        $daysOfSubject = $subject->getDays();

        if (self::isCrossing($board, $subject)) {
            return array($board, false); //if the subject is crossin, don't get in
        }

        for ($currentDay = 0; $currentDay < count($daysOfSubject); $currentDay++) {

            //*********************DATA OF CURRENT DAY **************/
            $nameOfCurrentDay = $daysOfSubject[$currentDay]['name'];
            $startHour = $daysOfSubject[$currentDay]['start_hour'];
            $finalHour = $daysOfSubject[$currentDay]['final_hour'];
            //******************************************************* */

            $posJDay = self::currentDayPositionBoard($board, $nameOfCurrentDay);

            for ($d = 1; $d < count($board); $d++) {
                if (HoursActions::betweenRange($board[$d][0], $startHour, $finalHour)) {
                    $board[$d][$posJDay] = $subject->getName();
                }
            }
        }
        return array($board, true);
    }

    /**
     * Function to test a board
     * @param $board
     */
    public static function printBoard($board): void
    {
        echo "<table border='1'>";
        for ($i = 0; $i < count($board); $i++) {
            echo "<tr>";
            for ($j = 0; $j < count($board[0]); $j++) {

                if ($i == 0) {
                    echo "<th>{$board[$i][$j]}</th>";
                } elseif ($board[$i][$j] == null) {
                    echo "<td></td>";
                } else {
                    echo "<td>" . $board[$i][$j] . "</td>";
                }

            }
            echo "</tr>";
        }
        echo "</table>";
    }

    /**
     * Function to verify the crossing of a matter VERIFICAR
     * @param $board    Board template
     * @param $subject  Subject to check if there is crossing
     * @return bool     True if the subject is crossing otherwise false
     */
    private static function isCrossing(array $board, SubjectModel $subject): bool
    {
        $daysOfSubject = $subject->getDays();

        for ($currentDay = 0; $currentDay < count($daysOfSubject); $currentDay++) {//Iterate for the days of the subject

            //***Current day data***************************
            $nameOfDay = $daysOfSubject[$currentDay]['name'];
            $startHour = $daysOfSubject[$currentDay]['start_hour'];
            $finalHour = $daysOfSubject[$currentDay]['final_hour'];
            //**********************************************

            $posJDay = self::currentDayPositionBoard($board, $nameOfDay);

            for ($d = 1; $d < count($board); $d++) {

                if (HoursActions::betweenRange($board[$d][0], $startHour, $finalHour) &&
                    $board[$d][$posJDay] !== null) {
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Function to return the current day in the board VERIFICAR
     * @param $board                Board template
     * @param $nameOfCurrentDay     The name of the current date
     * @return int
     */
    private static function currentDayPositionBoard($board, $nameOfCurrentDay): int
    {
        $pos = -1;
        for ($i = 0; $i < count($board[0]); $i++) {
            if ($board[0][$i] == $nameOfCurrentDay) {
                $pos = $i;
                break;
            }
        }
        return $pos;
    }

    /**
     * Function to generate an empty board
     * @param $startHour    Start of board
     * @param $finalHour    End of board
     * @return array        Empty board with name of days
     */
    private static function generateBoard(string $startHour, string $finalHour): array
    {
        $range = HoursActions::generateRange($startHour, $finalHour);//Range of hours
        $emptySchedule = array();
        for ($i = 0; $i < count($range); $i++) {
            if ($i == 0) {
                array_push($emptySchedule, array("hora", "lunes", "martes", "miercoles", "jueves", "viernes", "sabado", "virtual"));//Introducing names of days
            }
            array_push($emptySchedule, array($range[$i]->format('H:i'), null, null, null, null, null, null, null));
        }
        return $emptySchedule;
    }

    /**
     *Function to clear the board
     * @param $schedule
     */
    private static function clearBoard($schedule): array
    {
        for ($i = 1; $i < count($schedule); $i++) {
            for ($j = 1; $j < count($schedule[0]); $j++) {
                $schedule[$i][$j] = null;
            }
        }
        return $schedule;
    }

    /**
     * Funtion to avoid repeated schedules
     * @param $board            Builded board
     * @param $boardToSchedule  To verify if the schedule is not repeated
     * @return bool
     */
    private static function repeatedSchedule(array $boardToSchedule, array $board): bool
    {
        if(in_array($board, $boardToSchedule)){
            return true;
        }else{
            return false;
        }
    }

}