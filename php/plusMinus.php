<?php

/*
 * Given an array of integers, calculate the ratios of its elements that are positive, negative, and zero. 
 * Print the decimal value of each fraction on a new line with 6 places after the decimal.
 * 
 * Note: This challenge introduces precision problems. 
 * The test cases are scaled to six decimal places, 
 * though answers with absolute error of up to 10^-4  are acceptable.
 * 
 * Example
 * arr = [1,1,0,-1,-1]
 * 
 * There are n=5 elements, two positive, two negative and one zero. Their ratios are
 * 2/5 = 0.400000,
 * 2/5 = 0.400000, and
 * 1/5 = 0.200000.
 * Results are printed as:
 * 0.400000
 * 0.400000
 * 0.200000
 * 
 * 
 * Complete the 'plusMinus' function below.
 *
 * The function accepts INTEGER_ARRAY arr as parameter.
 */

function plusMinus($arr)
{
    // Loop through the array, categorizing each element as positive, negative or zero
    // Give an initial value to the three possible categories and increment as appropriate
    $positives = $negatives = $zeros = 0;
    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] > 0) {
            $positives++;
        } elseif ($arr[$i] < 0) {
            $negatives++;
        } else {
            $zeros++;
        }
    }
    // compute the ratio of each and get the decimal value
    echo number_format(($positives / count($arr)), 6, '.', '') . PHP_EOL;
    echo number_format(($negatives / count($arr)), 6, '.', '') . PHP_EOL;
    echo number_format(($zeros / count($arr)), 6, '.', '') . PHP_EOL;
}

// Lines of code Hackerrank uses to check accurary of your code commented out
// $n = intval(trim(fgets(STDIN)));

// $arr_temp = rtrim(fgets(STDIN));

// $arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$arr = [-4, 3, -9, 0, 4, 1];
plusMinus($arr);
// output:
// 0.5
// 0.333333
// 0.166667

$arr = [1, 2, 3, -1, -2, -3, 0, 0];
plusMinus($arr);
// output:
// 0.375
// 0.375
// 0.25
?>