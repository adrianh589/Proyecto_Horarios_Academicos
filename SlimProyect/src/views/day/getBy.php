<?php

$json = array();

if( !empty($days)  ) {
    for ($i = 0; $i < count($days); $i++){
        array_push($json, $days[$i]->jsonSerializeClass());
    }
    $result = json_encode($json);
}else{
    $result = json_encode($days);
}