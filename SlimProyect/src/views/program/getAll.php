<?php

$json = array();

for($i = 0; $i < count($periods); $i++){
    $encode =   $periods[$i]->jsonSerialize() ;
    array_push($json, $encode);
}

$result = json_encode($json);