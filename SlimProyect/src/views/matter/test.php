<?php
//json
$json = array();

for($i = 0; $i < count($subjects); $i++){
    $encode =   $subjects[$i]->jsonSerialize() ;
    array_push($json, $encode);
}

$result = json_encode($json);