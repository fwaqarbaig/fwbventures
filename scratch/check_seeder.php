<?php

$c = file_get_contents(__DIR__.'/../database/seeders/FwbAllLeafServicesSeeder.php');
preg_match_all('/.{0,40}(?:923000000000|\+92[\s\-]?300[\s\-]?0000000|wa\.me\/92300|300[\s\-]?0000000).{0,40}/i', $c, $m);
print_r($m[0]);
