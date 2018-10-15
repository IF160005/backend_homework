<?php
require __DIR__ . "/../vendor/autoload.php";

use Sigita\File1;
use Sigita\File2;

$numbers = File1\createArray(1, 2, 3, 4, 5, 5);
$standardDev = File1\standardDeviation($numbers);
$distribType = File1\distributionType($numbers);
$createMatrix = File1\createMatrix($numbers);
$createMatrix = File1\createMatrix(null);
File2\printFloat('Standard deviation: ', $standardDev);
File2\printString('distribution type: ', $distribType);
File2\printArray('Matrix of arrays: ', $createMatrix);
File2\printArray(null, null);


