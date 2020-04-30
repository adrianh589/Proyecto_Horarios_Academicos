<?php

function autoload_models($class) {
    $fix = str_replace("\\","/", $class);
    require  $fix . '.php';
}

spl_autoload_register('autoload_models');
