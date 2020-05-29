<?php

if( is_object($subject)  ) {
    $json = array($subject->jsonSerialize());
    $result = json_encode($json);
}else{
    $result = json_encode($subject);
}