<?php

/*
 * There will be two arrays of integers. Determine all integers
 * that satisfy the following two conditions:
 * 
 * 1. The elements of the first array are all factors of 
 *      the integer being considered
 * 2. The integer being considered is a factor of all elements of 
 *      the second array
 * 
 * These numbers are referred to as being between the two arrays.
 * Determine how many such numbers exist.
 * 
 * Example
 * a = [2,6]
 * b = [24, 36] 
 * 
 * There are two numbers between the arrays: 6 and 12
 * 6%2 = 0, 6%6 = 0, 24%6 = 0 and 36%6 = 0 for the first value
 * 12%2 = 0, 12%6 = 0, 24%12 = 0 and 36%12 = 0 for the second value
 * 
 * Return 2
 * 
 * 
 * Complete the 'getTotalX' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER_ARRAY a
 *  2. INTEGER_ARRAY b
 */

function getTotalX($a, $b) {
    // Write your code here
    $num = 0;
    $a_count = 0;
    $b_count = 0;
    /* 
     * For all elements in the first array to be a factor of the
     * integer being considered, the integer must be at least 
     * the largest number in the first array, max(a)
     * For the integer to be a factor of all elements of the
     * second array, the integer must be at most
     * the smallest number in the second array, min(b)
     * Therefore, start the for loop at i = max(a) 
     * and end it at i = min(b)
     * 
     */ 
    for ($i = max($a); $i <= min($b); $i++) {
        /*
         * Loop through all the numbers in a,
         * increment a_count in each iteration
         * if the number a[j] is a factor of the integer i
         */ 
        for ($j = 0; $j < count($a); $j++) {
            if ($i % $a[$j] == 0) {
                $a_count++;
            }
        }
        /*
         * If all the numbers in a are factors of integer i,
         * count_a will be equal to the length of the array a
         * If so, check if the integer satisfies the second condition
         * i.e. the integer being considered is a factor of all elements 
         * of the second array: 
         *  Loop through all the elements in b
         *  increment b_count whenever i is a factor of b[k]
         * 
         */ 
        if ($a_count == count($a)) {
            for ($k = 0; $k < count($b); $k++) {
                if ($b[$k] % $i == 0) {
                    $b_count++;
                }
            }
        }
        /*
         * If the integer being considered is a factor of all elements 
         * of the second array, b_count will be equal to the length of b
         * Thus, the integer fulfills both conditions, increment num
         */ 
        if ($b_count == count($b)) {
            $num++;
        }
        /*
         * Set a_count and b_count to 0 before checking 
         * if another integer fulfills both conditions
         */ 
        $a_count = 0;
        $b_count = 0;
    }
    return $num;

}
$a = [2,4];
$b = [16,32,96];
echo getTotalX($a, $b);
/*

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$n = intval($first_multiple_input[0]);

$m = intval($first_multiple_input[1]);

$arr_temp = rtrim(fgets(STDIN));

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$brr_temp = rtrim(fgets(STDIN));

$brr = array_map('intval', preg_split('/ /', $brr_temp, -1, PREG_SPLIT_NO_EMPTY));

$total = getTotalX($arr, $brr);

fwrite($fptr, $total . "\n");

fclose($fptr);
*/

?>