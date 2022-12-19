<?php

/*
 * Given two arrays of integers, 
 * find which elements in the second array are missing from the first array.
 * 
 * Example
 * arr = [7,2,5,3,5,3]
 * brr = [7,2,5,4,6,3,5,3] 
 * 
 * The brr array is the original list. The numbers missing are [4,6] 
 * 
 * Notes
 * 
 * - If a number occurs multiple times in the lists, 
 *      you must ensure that the frequency of that number in both lists is the same. 
 *      If that is not the case, then it is also a missing number.
 * - Return the missing numbers sorted ascending.
 * - Only include a missing number once, even if it is missing multiple times.
 * - The difference between the maximum and minimum numbers in the original list is less than or equal to 100.
 * 
 * Complete the 'missingNumbers' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts following parameters:
 *  1. INTEGER_ARRAY arr
 *  2. INTEGER_ARRAY brr
 */

function missingNumbers($arr, $brr) {
    // Write your code here
    $arr_copy = $arr;
    $brr_copy = $brr;

    sort($arr_copy);
    sort($brr_copy);

    $missing = [];
    $j = 0;

    /*
     * Since both arrays are sorted, the elements at positions i and j should be the same 
     * if there are no missing numbers.
     * Loop through brr_copy
     * If the element of brr_copy at position i is the same as the element in arr_copy at position j
     * - increment j by 1 and go to the next iteration of i 
     *   (by incrementing j, previous elements in arr_copy are not rechecked 
     *   and this allows us to treat duplicates as new elements)
     * Else, this means the element brr_copy[i] is missing from arr_copy:
     * - check if array missing already contains brr_copy[i]
     * - if not, add brr_copy[i] to missing
     * - go to the next iteration of i WITHOUT incrementing the value of j
     */ 
    for ($i = 0; $i < count($brr_copy); $i++) {        
        if ($brr_copy[$i] == $arr_copy[$j]) {
            $j++;
        } else {
            if (!in_array($brr_copy[$i], $missing)) {
                $missing[] = $brr_copy[$i];
            }    
        }
    }
    return $missing;
}

/*
$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$arr_temp = rtrim(fgets(STDIN));

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$m = intval(trim(fgets(STDIN)));

$brr_temp = rtrim(fgets(STDIN));

$brr = array_map('intval', preg_split('/ /', $brr_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = missingNumbers($arr, $brr);

fwrite($fptr, implode(" ", $result) . "\n");

fclose($fptr);
*/

?>