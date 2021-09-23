<?php
interface MatrixDrawerInterface {
    public function draw();
    public function rotateLeft();
    public function rotateRight();
    public function generateRandomMatrix(int $n);
}