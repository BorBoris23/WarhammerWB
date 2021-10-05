<?php
require_once('./app/includes.php');

$simulation = new Simulation(60, 32, 'saveFile.txt');

if(file_exists($simulation->fileName) === true) {
    $simulation->reset();
}
$simulation->addContentToMap();

echo json_encode($simulation);