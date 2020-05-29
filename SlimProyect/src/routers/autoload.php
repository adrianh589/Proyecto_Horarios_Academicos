<?php
/**
 * File to autoload all routers automatically
 * @author Adrian Hoyos
 */
foreach (glob(__DIR__."/*.route.php") as $filename)
{
    require_once $filename;
}