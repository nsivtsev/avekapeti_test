<?php
include('src/MatrixDrawer.php');

// Q3: rotate matrix
$array = [
    [1,0,0,0],
    [1,0,0,0],
    [0,0,0,0],
    [0,0,0,1]
];

$matrix3 = new MatrixDrawer();
$matrix3->setMatrix($array);

try {
    $matrix3->rotateRight(180); // To rotate left, use rotateLeft()
} catch (Exception $exception) {
    $exception->getMessage();
}

try {
    $matrix3->draw();
} catch (Exception $exception) {
    $exception->getMessage();
}


