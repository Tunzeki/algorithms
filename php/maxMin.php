<?php

/*
 * You will be given a list of integers, arr, and a single integer k. 
 * You must create an array of length k from elements of arr such that its unfairness is minimized. 
 * Call that array arr'. 
 * Unfairness of an array is calculated as
 * max(arr') - min(arr')
 * where:
 * - max denotes the largest integer in arr'
 * - min denotes the smallest integer in arr'
 * 
 * Example
 * arr = [1,4,7,2] 
 * k = 2
 * Testing for all pairs, the solution [1,2] provides for the 
 * minimum unfairness
 * 
 * Complete the 'maxMin' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER k
 *  2. INTEGER_ARRAY arr
 */

function maxMin($k, $arr)
{
    // Write your code here
    /*
     * Create a copy of the array and sort it
     * Initialize the unfairness to be the difference between (k-1)th element and the zeroth element
     * (k-1) since the index of the first element is zero
     */ 
    $arr_copy = $arr;
    sort($arr_copy);
    $unfairness = $arr_copy[$k - 1] - $arr_copy[0];
    /*
     * Loop through the array until there are just (k-1) elements left
     * Since i starts from 0, i at this point will be <= count($arr_copy) - $k
     * We need to find the difference between the max(arr') and min(arr') of an array of length k
     * At each iteration, i is min(arr'), 
     * so we need to check the element (k - 1) places to the right of i, max(arr') for any i
     * if the difference between these two elements is less than the previously set unfairness,
     * set unfairness equal to the difference between the two elements
     * 
     * Return unfairness
     */
    for ($i = 0; $i <= (count($arr_copy) - $k); $i++) {
        $current_unfairness = $arr_copy[$i + $k - 1] - $arr_copy[$i];
        if ($current_unfairness < $unfairness) {
            $unfairness = $current_unfairness;
        }
    }
    return $unfairness;
}

$k = 2;
$arr = [3,10,11,300, 200,1000,20,30];
echo maxMin($k, $arr);
/*
$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$k = intval(trim(fgets(STDIN)));

$arr = array();

for ($i = 0; $i < $n; $i++) {
    $arr_item = intval(trim(fgets(STDIN)));
    $arr[] = $arr_item;
}

$result = maxMin($k, $arr);

fwrite($fptr, $result . "\n");

fclose($fptr);
*/

?>