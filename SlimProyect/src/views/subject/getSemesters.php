<?php

$json = array();

for($i = 0; $i < count($semesters); $i++){
    $encode =   $semesters[$i]->jsonSerializeSemesters() ;
    array_push($json, $encode);
}

$result = json_encode($json);