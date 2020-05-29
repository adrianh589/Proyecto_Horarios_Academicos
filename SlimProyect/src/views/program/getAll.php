<?php

$json = array();

for($i = 0; $i < count($programs); $i++){
    $encode =   $programs[$i]->jsonSerialize() ;
    array_push($json, $encode);
}

$result = json_encode($json);