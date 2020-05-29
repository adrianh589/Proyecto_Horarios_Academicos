<?php

if( is_object($nrc)  ) {
    $json = array($nrc->jsonSerialize());
    $result = json_encode($json);
}else{
    $result = json_encode($nrc);
}