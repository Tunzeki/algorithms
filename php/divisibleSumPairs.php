<?php
/*
 * Given an array of integers and a positive integer k, 
 * determine the number of (i,j) pairs where i < j and ar[i] + ar[j] is divisible by k.
 * 
 * Example
 * ar = [1,2,3,4,5,6]
 * k = 5
 * n = 6 (number of items in ar)
 * 
 * Three pairs meet the criteria:
 * 
 * [0,3] -> ar[0] + ar[3] -> 1 + 4 = 5
 * [1,2] -> ar[1] + ar[2] -> 2 + 3 = 5
 * [3,5] -> ar[3] + ar[5] -> 4 + 6 = 10 
 * 
 * Complete the 'divisibleSumPairs' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER n
 *  2. INTEGER k
 *  3. INTEGER_ARRAY ar
 */

function divisibleSumPairs($n, $k, $ar)
{
    // pairs is an associative array containing the pairs meeting the criteria
    $pairs = [];
    // For each element i in the input array:
    // Add it sequentially to each of the remaining items j after its position in the input array
    // If the sum gives a number divisible by k:
    // Add i,j as an array to pairs array
    for ($i = 0; $i < $n; $i++) {
        for ($j = $i + 1; $j < $n; $j++) {
            if (($ar[$i] + $ar[$j]) % $k === 0) {
                $pairs[] = [$i, $j];
            }
        }
    }
    return count($pairs);
}

/* Comment out HackerRAnk code
 *
 * 
 * $fptr = fopen(getenv("OUTPUT_PATH"), "w");
 * 
 * $first_multiple_input = explode(' ', rtrim(fgets(STDIN)));
 * 
 * $n = intval($first_multiple_input[0]);
 * 
 * $k = intval($first_multiple_input[1]);
 * 
 * $ar_temp = rtrim(fgets(STDIN));
 * 
 * $ar = array_map('intval', preg_split('/ /', $ar_temp, -1, PREG_SPLIT_NO_EMPTY));
 * 
 * $result = divisibleSumPairs($n, $k, $ar);
 * 
 * fwrite($fptr, $result . "\n");
 * 
 * fclose($fptr);
 */
 
echo divisibleSumPairs(6, 3, [
1, 3, 2, 6, 1, 2]); // 5