<?php

if( is_object($program)  ) {
    $json = array($program->jsonSerialize());
    $result = json_encode($json);
}else{
    $result = json_encode($program);
}