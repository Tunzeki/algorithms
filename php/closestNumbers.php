<?php

/*
 * Given a list of unsorted integers, arr, 
 * find the pair of elements that have the smallest absolute difference between them. 
 * If there are multiple pairs, find them all.
 * 
 * Example
 * arr = [5,4,3,2,1] 
 * Sorted, arr' = [1,2,3,4,5]
 * Several pairs have the minimum difference of 1:
 * [(1,2), (2,3), (3,4), (4,5)]
 * Return the array [1,2,2,3,3,4,4,5]
 * 
 * Complete the 'closestNumbers' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts INTEGER_ARRAY arr as parameter.
 */

function closestNumbers($arr)
{
    // Write your code here
    // Create a copy of the input array and sort this copy
    $arr_copy = $arr;
    sort($arr_copy);
    // new_arr is the array that will contain the pairs of elements to be returned by this function
    $new_arr = [];
    /*
     * Initialize smallest_difference as the difference between arr_copy[1] and arr_copy[0] 
     * Loop through the rest of the elements in arr_copy
     * in a bid to find the smallest difference between two successive elements.
     * 
     */ 
    $smallest_difference = $arr_copy[1] - $arr_copy[0];
    for ($i = 2; $i < count($arr_copy); $i++) {
        if (($arr_copy[$i] - $arr_copy[$i - 1]) < $smallest_difference) {
            $smallest_difference = $arr_copy[$i] - $arr_copy[$i - 1];
        }
    }
    /* 
     * Loop through the elements in arr_copy
     * in a bid to find all pairs of elements (arr[i] and arr[i+1]) 
     * whose difference is equal to the smallest_difference
     * 
     */
    for ($i = 0; $i < (count($arr_copy) - 1); $i++) {
        if (($arr_copy[$i + 1] - $arr_copy[$i]) == $smallest_difference) {
            $new_arr[] = $arr_copy[$i];
            $new_arr[] = $arr_copy[$i + 1];
        }
    }
    return $new_arr;
}

/*
$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$arr_temp = rtrim(fgets(STDIN));

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = closestNumbers($arr);

fwrite($fptr, implode(" ", $result) . "\n");

fclose($fptr);
*/

?>