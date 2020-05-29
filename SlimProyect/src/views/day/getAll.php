<?php

$json = array();

for($i = 0; $i < count($days); $i++){
    $encode =   $days[$i]->jsonSerialize() ;
    array_push($json, $encode);
}

$result = json_encode($json);
