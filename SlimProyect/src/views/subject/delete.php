<?php

$result = ($status) ? json_encode(array("message" => "Subject succesfully deleted, also your classes, nrcs and programs->subjects relation")) : json_encode(array("message" => "An error ocurred in delete"));