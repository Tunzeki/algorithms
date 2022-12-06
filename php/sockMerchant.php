<?php

/*
 * There is a large pile of socks that must be paired by color. 
 * Given an array of integers representing the color of each sock, 
 * determine how many pairs of socks with matching colors there are.
 * 
 * Complete the 'sockMerchant' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER n
 *  2. INTEGER_ARRAY ar
 */

function sockMerchant($n, $ar)
{
    // Write your code here
    // $pairs is the return parameter
    $pairs = 0;
    // create a copy of the input array and sort it in ascending order
    $ar_copy = $ar;
    sort($ar_copy);
    /*
     * For any unpaired item in the array, $ar_copy,
     * if it is a pair, the next item to it must be exactly the same as this unpaired item
     * Once you determine that an item and the item next to it are a pair, 
     * skip the item next to it in the next iteration
     * This will avoid putting the same item in two different pairs
     * e.g. in 2, 2, 2, 5, 7
     * There is just one pair of 2's. 
     * But if the iteration involving the second 2 was not skipped,
     * it will appear as though there are two pairs of 2's. 
     * 
     * $n - 1 is used in the condition of the for loop because there is no point iterating 
     * over the last item of the array
     */
    for ($i = 0; $i < $n - 1; $i++) {
        $j = $i + 1;
        if ($ar_copy[$i] == $ar_copy[$j]) {
            $pairs++;
            $i++;
        }
    }

    return $pairs;
}

/*
$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$ar_temp = rtrim(fgets(STDIN));

$ar = array_map('intval', preg_split('/ /', $ar_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = sockMerchant($n, $ar);

fwrite($fptr, $result . "\n");

fclose($fptr);
*/
