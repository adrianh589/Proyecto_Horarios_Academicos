<?php

if( is_object($period)  ) {
    $json = array($period->jsonSerialize());
    $result = json_encode($json);
}else{
    $result = json_encode($period);
}