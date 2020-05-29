<?php

if( is_object($workday)  ) {
    $json = array($workday->jsonSerialize());
    $result = json_encode($json);
}else{
    $result = json_encode($workday);
}