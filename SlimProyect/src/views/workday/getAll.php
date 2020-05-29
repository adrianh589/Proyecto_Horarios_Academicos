<?php

$json = array();

for($i = 0; $i < count($workdays); $i++){
    $encode =   $workdays[$i]->jsonSerialize() ;
    array_push($json, $encode);
}

$result = json_encode($json);