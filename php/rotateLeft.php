<?php

/*
 * A left rotation operation on an array of size n shifts each of the array's elements 1 unit to the left. 
 * Given an integer, d, rotate the array that many steps left and return the result.
 * 
 * Example
 * d = 2
 * arr = [1,2,3,4,5]
 * 
 * After 2 rotations,
 * arr' = [3,4,5,1,2]
 * 
 * Complete the 'rotateLeft' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts following parameters:
 *  1. INTEGER d
 *  2. INTEGER_ARRAY arr
 */

function rotateLeft($d, $arr)
{
    // Write your code here
    // Create a new empty array
    $new_arr = [];
    /*
     * The first element in the new array created after left rotation
     * is always the first element in the input array, arr,
     * that was not left rotated. 
     * The other elements not left rotated follow sequentially
     */
    for ($i = $d; $i < count($arr); $i++) {
        $new_arr[] = $arr[$i];
    }
    /* After elements not left rotated have been added to new_arr,
     * the elements in arr that are left rotated will follow
     * sequentially starting from the element at position 0
     * and up to position (d - 1)
     */
    for ($i = 0; $i < $d; $i++) {
        $new_arr[] = $arr[$i];
    }
    return $new_arr;
}

/*
$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$n = intval($first_multiple_input[0]);

$d = intval($first_multiple_input[1]);

$arr_temp = rtrim(fgets(STDIN));

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = rotateLeft($d, $arr);

fwrite($fptr, implode(" ", $result) . "\n");

fclose($fptr);

*/

?>