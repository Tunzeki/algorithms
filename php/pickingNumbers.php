<?php

/*
 * Given an array of integers, 
 * find the longest subarray where the absolute difference between any two elements is less than or equal to 1.
 * 
 * Example
 * a = [1,1,2,2,4,4,5,5,5]
 * There are two subarrays meeting the criterion:
 * [1,1,2,2] and [4,4,5,5,5]
 * The maximum length subarray has 5 elements
 * 
 * Complete the 'pickingNumbers' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts INTEGER_ARRAY a as parameter.
 */

function pickingNumbers($a) {
    // Write your code here
    // It is a good idea to copy an array and sort the copy because sorting the original changes it
    $a_copy = $a;
    sort($a_copy);
    // Initialize the count of elements in the longest subarray to 1
    $max_subarray_count = 1;
    for ($i = 0; $i < count($a_copy); $i++) {
        // Initialize the count of elements in the current subarray to 1
        $current_subarray_count = 1;
        /*
         * Loop through each element, a_copy[j], to the right of a_copy[i]
         * and increase the count of elements in the current subarray by 1,
         * provided that a_copy[j] - a_copy[i]) <= 1. Otherwise,
         * break out of the inner loop
         * Check if current_subarray_count is greater than max_subarray_count,
         * in which case max_subarray_count should be set to current_subarray_count.
         * Go to the next element a_copy[i] and repeat the steps
         */ 
        for ($j = $i + 1; $j < count($a_copy); $j++) {
            if (($a_copy[$j] - $a_copy[$i]) <= 1) {
                $current_subarray_count++;
            } else {
                break;
            }
        }
        if ($current_subarray_count > $max_subarray_count) {
            $max_subarray_count = $current_subarray_count;    
        }
            
    }
    return $max_subarray_count;

}

$a = [3,3,1,4,6,5];
echo pickingNumbers($a);
/*
$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$a_temp = rtrim(fgets(STDIN));

$a = array_map('intval', preg_split('/ /', $a_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = pickingNumbers($a);

fwrite($fptr, $result . "\n");

fclose($fptr);
*/
