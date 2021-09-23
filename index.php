<?php

interface MatrixDrawerInterface {
    public function draw();
}

class MatrixDrawer implements MatrixDrawerInterface
{
    private $matrix;

    private $drawingRule = [
            0 => ' ',
            1 => '*',
        ];

    public function setMatrix(Array $matrix) {
        try {
            $this->validateMatrix($matrix);
            $this->matrix = $matrix;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function generateMatrix(int $n) {
        for ($i=0; $i<$n; $i++) {
            for ($j=0; $j<$n; $j++) {
                $this->matrix[$i][$j] = array_rand($this->drawingRule);
            }
        }

        return true;
    }

    /**
     * function to check the squareness of array and allowed symbols
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

// Q1: draw matrix
$array = [
    [1,0,1],
    [0,1,0],
    [0,0,1]
];
$matrix = new MatrixDrawer();
$matrix->setMatrix($array);
$matrix->draw();

echo PHP_EOL;

// Q2: Draw random matrix
$matrix2 = new MatrixDrawer();
$matrix->generateMatrix(5);
$matrix->draw();
