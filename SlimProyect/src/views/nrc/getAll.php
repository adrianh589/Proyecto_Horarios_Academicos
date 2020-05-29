<?php

$json = array();

for($i = 0; $i < count($nrcs); $i++){
    $encode =   $nrcs[$i]->jsonSerialize() ;
    array_push($json, $encode);
}

$result = json_encode($json);