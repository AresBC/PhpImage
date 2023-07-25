<?php declare(strict_types=1);

namespace App\MathAlgorithm;

class EuclideanAlgorithm implements Algorithm
{
    public function execute($numberOne, $numberTwo): int {
        $rest = 1;
        while ($rest != 0) {
            $rest = $numberOne % $numberTwo;
            $numberOne = $numberTwo;
            $numberTwo = $rest;
        }
        return $numberOne;
    }
}