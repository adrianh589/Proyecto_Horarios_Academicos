<?php

$result = ($status) ? json_encode(array("message" => "Succesfully deleted, too the relation with programs and programs->subjects")) : json_encode(array("message" => "An error ocurred in delete"));