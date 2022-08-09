<?php

/*
 * Complete the 'miniMaxSum' function below.
 *
 * The function accepts INTEGER_ARRAY arr as parameter.
 * 
 * 
 * Given five positive integers, 
 * find the minimum and maximum values that can be calculated by summing exactly four of the five integers. 
 * Then print the respective minimum and maximum values as a single line of two space-separated long integers.
 * 
 * Example
 * arr = [1,3,5,7,9]
 * The minimum sum is 1+3+5+7 = 16
 * and the maximum sum is 3+5+7+9 = 24.
 * The function prints:
 * 16 24
 * 
 */

function miniMaxSum($arr)
{
    // Sort the array in ascending order (smallest value to largest value) first
    // min_sum is the sum of the four smallest numbers
    // max_sum is the sum of the four largest numbers
    sort($arr);
    $min_sum = $arr[0] + $arr[1] + $arr[2] + $arr[3];
    $max_sum = $arr[1] + $arr[2] + $arr[3] + $arr[4];
    echo $min_sum . ' ' . $max_sum;
}

// $arr_temp = rtrim(fgets(STDIN)); // HackerRank comment

// $arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY)); // HackerRank comment
$arr = [256741038, 623958417, 467905213, 714532089, 938071625];
miniMaxSum($arr);
echo PHP_EOL;
$arr = [1, 2,3,4, 5];
miniMaxSum($arr);
