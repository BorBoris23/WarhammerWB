<?php
require_once __DIR__.'/../app/includes.php';

$simulation = new Simulation(60, 32);

if(file_exists($simulation->fileName) === true) {
    $simulation->map = $simulation->reader->read();
} else {
    $simulation->addContentToMap();
}
$simulation->nextMove();

echo json_encode($simulation);



