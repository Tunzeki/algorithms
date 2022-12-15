<?php

/*
 * The absolute difference is the positive difference between 
 * two values a and b, is written |a - b| or |b - a|
 * and they are equal. 
 * If a = 3 and b = 2, |3 - 2| = |2 - 3| = 1.
 * 
 * Given an array of integers, find the mminimum absolute difference
 * between any two elements in the array.
 * 
 * Complete the 'minimumAbsoluteDifference' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts INTEGER_ARRAY arr as parameter.
 */

function minimumAbsoluteDifference($arr)
{
    // Write your code here
    $arr_copy = $arr;
    /*
     * Sort the array
     * That way, the minimum absolute difference will always be 
     * between two consecutive elements
     */ 
    sort($arr_copy);
    /*
     * Initialize the minimum absolute difference to be 
     * the difference between the first and second elements
     * of the array 
     */ 
    $min_diff = abs($arr_copy[1] - $arr_copy[0]);
    /*
     * Loop through each element of the array,
     * finding the absolute difference between it 
     * and the next element (current absolute difference).
     * If this difference is less than the minimum absolute difference,
     * set the minimum absolute difference to the current absolute difference
     */ 
    for ($i = 0; $i < (count($arr_copy) - 1); $i++) {
        $current_diff = abs($arr_copy[$i + 1] - $arr_copy[$i]);
        if ($current_diff < $min_diff) {
            $min_diff = $current_diff;
        }
    }
    return $min_diff;
}

/*
$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$arr_temp = rtrim(fgets(STDIN));

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = minimumAbsoluteDifference($arr);

fwrite($fptr, $result . "\n");

fclose($fptr);
*/

?>
