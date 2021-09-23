<?php
include('src/MatrixDrawer.php');

// Q1: draw matrix
$array = [
    [1,0,0],
    [0,1,0],
    [0,0,1]
];

$matrix = new MatrixDrawer();
$matrix->setMatrix($array);

try {
    $matrix->draw();
} catch (Exception $exception) {
    $exception->getMessage();
}
