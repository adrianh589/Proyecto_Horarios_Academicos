<?php

//json
$json = array();

for($i = 0; $i < count($schedules); $i++){
    $aux = array();
    for ($j = 0; $j < count($schedules[$i]); $j++){
        $encode =   $schedules[$i][$j]->jsonSerialize();
        array_push($aux, $encode);
    }
    array_push($json, $aux);
}

$schedules = json_encode($json);
