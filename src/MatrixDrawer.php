<?php
include('src/MatrixInterface.php');

class MatrixDrawer implements MatrixDrawerInterface
{
    private $matrix;

    // allowed values and symbols to draw
    // value => symbol
    private $drawingRule = [
        0 => ' ',
        1 => '*',
    ];

    public function setMatrix(Array $matrix) {
        try {
            $this->validateMatrix($matrix); //validate matrix before set
            $this->matrix = $matrix;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Generate random matrix
     * @param int $n
     */
    public function generateRandomMatrix(int $n) {
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $this->matrix[$i][$j] = array_rand($this->drawingRule); // get random value from allowed
            }
        }
    }

    /**
     * Check the squareness of array and allowed symbols
     * @param array $matrix
     * @return void
     * @throws Exception
     */
    private function validateMatrix(Array $matrix)
    {
        $length = count($matrix);
        foreach ($matrix as $row) {
            if ($length !== count($row)) {
                throw new Exception('Array is not a square');
            }

            foreach ($row as $col) {
                if (!isset($this->drawingRule[$col])) {
                    throw new Exception('Unexcepted symbol!');
                }
            }
        }
    }

    /**
     * Clockwise rotating
     * @param int $degree
     * @throws Exception
     */
    public function rotateRight(int $degree = 90) {
        if ($this->matrix) {
            $iterations = intdiv($degree, 90);
            for ($i = 0; $i < $iterations; $i++) {
                $this->matrix = array_map(null, ...$this->matrix);
                $this->matrix = array_map('array_reverse', $this->matrix);
            }
        } else {
            throw new Exception('Matrix is not initiated');
        }
    }

    /**
     * Counterclockwise rotating
     * @param int $degree
     * @throws Exception
     */
    function rotateLeft(int $degree = 90){
        if ($this->matrix) {
            $iterations = intdiv($degree, 90);
            for ($i = 0; $i < $iterations; $i++) {
                $arr = $this->matrix;
                $this->matrix = array_map(function ($row, $i) use ($arr) {
                    return array_column($arr, count($arr[0]) - 1 - $i);
                }, $arr[0], array_keys($arr[0]));
            }
        } else {
            throw new Exception('Matrix is not initiated');
        }
    }

    /**
     * @throws Exception
     */
    public function draw() {
        if ($this->matrix) {
            foreach ($this->matrix as $row) {
                foreach ($row as $col) {
                    echo $this->drawingRule[$col];
                }
                echo PHP_EOL;
            }
        } else {
            throw new Exception('Matrix is not initiated');
        }
    }
}