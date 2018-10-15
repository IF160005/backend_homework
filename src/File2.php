<?php

namespace Sigita\File2;

function printFloat($description, $number)
{
    echo sprintf('%s %d <br>', $description, $number);
}

function printString($description, $stringValue)
{
    echo sprintf('This is %s %s <br>', $description, $stringValue);
}

function printArray($description, $matrix = array())
{
    echo $description;
    if ($matrix === null) {
        echo 'not supported matrix type';
    } else if ($matrix === array()) {
        echo 'no values';
    } else {
        echo '<table>';
        for ($i = 0; $i < count($matrix); $i++) {
            echo '<tr>';
            for ($j = 0; $j < count($matrix[$i]); $j++) {
                echo sprintf('<td>%d</td>', $matrix[$i][$j]);
            }
            echo '</tr>';
        }
        echo '</table>';
    }
}