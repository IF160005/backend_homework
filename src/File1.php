<?php declare(strict_types=1);

namespace Sigita\File1;

use MathPHP\Statistics\Average;
use MathPHP\Functions\Map;
use MathPHP\LinearAlgebra\MatrixFactory;

function randArray(): array
{
    $numbers = array();
    for ($i = 0; $i < 4; $i++) {
        $number = rand(14, 100);
        array_push($numbers, $number);

    }
    return $numbers;
}

function createArray(int...$numbers): array
{
    return $numbers;
}

function standardDeviation(array $numbers): float
{
    $mean = Average::mean($numbers);
    $secArray = array();
    for ($i = 0; $i < sizeof($numbers); $i++) {
        $secArray[$i] = ($numbers[$i] - $mean) * $numbers[$i];
    }
    $sumOfSecArray = array_sum($secArray);
    $standardDeviation = sqrt(1 / count($secArray) * $sumOfSecArray);
    return $standardDeviation;
}

function distributionType(array $numbers): string
{
    $mode = Average::mode($numbers);
    $modeQuantity = count($mode);
    switch ($modeQuantity) {
        case 0:
            $stmt = "distribution doesn't has mode";
            break;
        case 1:
            $stmt = "unimodal distribution";
            break;
        default:
            $stmt = "binomial distribution";
            break;
    }
    return $stmt;
}

function createMatrix(?array $numbers): array
{
    if ($numbers === null) {
        $numbers = randArray();
    }
    $newNumbersArray = Map\Single::square($numbers);
    $arrayOfboth = Map\Multi::add($numbers, $newNumbersArray);
    $firstRow = ($numbers);
    $secondRow = ($newNumbersArray);
    $thirdRow = ($arrayOfboth);
    $matrix = MatrixFactory::create([$firstRow, $secondRow, $thirdRow]);
    return $matrix->getMatrix();
}


