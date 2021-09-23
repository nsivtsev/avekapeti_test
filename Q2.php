<?php
include('src/MatrixDrawer.php');

// Q2: Draw random matrix
$matrix2 = new MatrixDrawer();
$matrix2->generateRandomMatrix(6);

try {
    $matrix2->draw();
} catch (Exception $exception) {
    $exception->getMessage();
}

