<?php

/*
 * There are two n-element arrays of integers, A and B.
 * Permute them into some A' and B' such that the relation
 * A'[i] + B'[i] >= k holds for all i where 0 <= i < n.
 * 
 * There will be q queries consisting of A, B, and k.
 * For each query, return  YES if some permutation A', B' 
 * satisfying the relation exists.
 * Otherwise, return NO.
 * 
 * Complete the 'twoArrays' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts following parameters:
 *  1. INTEGER k
 *  2. INTEGER_ARRAY A
 *  3. INTEGER_ARRAY B
 */

function twoArrays($k, $A, $B)
{
    /*
     * For this to work, first sort one of the arrays in ascending order
     * and the other in descending order.
     * This way, you're adding the biggest to the smallest, 
     * number immediately smaller than the biggest to the number immediately bigger than the smallest,
     * and so on.
     * If the addition of these two numbers at each step is smaller than $k,
     * return NO
     * If the condition of the if statement is not met at any point during the execution
     * of the for loop, it means the addition of the two numbers at each step is >= $k,
     * in which case return YES
     */ 
    $A_prime = $A;
    sort($A_prime);
    $B_prime = $B;
    rsort($B_prime);
    for ($i = 0; $i < count($A); $i++) {
        if (($A_prime[$i] + $B_prime[$i]) < $k) {
            return 'NO';
        }
    }
    return 'YES';
}

$k = 10;
$A = [2, 1, 3];
$B = [7, 8, 9];

echo twoArrays($k, $A, $B);

/*
$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$q = intval(trim(fgets(STDIN)));

for ($q_itr = 0; $q_itr < $q; $q_itr++) {
    $first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

    $n = intval($first_multiple_input[0]);

    $k = intval($first_multiple_input[1]);

    $A_temp = rtrim(fgets(STDIN));

    $A = array_map('intval', preg_split('/ /', $A_temp, -1, PREG_SPLIT_NO_EMPTY));

    $B_temp = rtrim(fgets(STDIN));

    $B = array_map('intval', preg_split('/ /', $B_temp, -1, PREG_SPLIT_NO_EMPTY));

    $result = twoArrays($k, $A, $B);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);

*/

?>