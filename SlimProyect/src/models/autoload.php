<?php

/**
 * File to autoload all models automatically
 * @author Adrian Hoyos
 */

foreach (glob(__DIR__."/*.php") as $filename)
{
    require_once $filename;
}