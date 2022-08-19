<?php
/*
 * Find the Median
 * 
 * The median of a list of numbers is essentially its middle element after sorting.
 * The same number of elements occur after it as before.
 * Given a list of numbers with an odd number of elements,
 * find the median.
 * 
 * Complete the 'findMedian' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts INTEGER_ARRAY arr as parameter.
 */

function findMedian($arr)
{
    // Write your code here
    sort($arr);
    $median_index = round((count($arr) / 2), PHP_ROUND_HALF_DOWN);

    return $arr[$median_index];
}

/* Comment out HackerRank code

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$arr_temp = rtrim(fgets(STDIN));

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = findMedian($arr);

fwrite($fptr, $result . "\n");

fclose($fptr);

*/

$arr = [5,3,2,1,4];
echo findMedian($arr);