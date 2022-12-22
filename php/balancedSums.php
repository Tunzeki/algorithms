<?php

/*
 * Watson gives Sherlock an array of integers. 
 * His challenge is to find an element of the array such that 
 * the sum of all elements to the left is equal to the sum of all elements to the right.
 * 
 * Example
 * 
 * arr = [5,6,8,11]
 * 
 * 8 is between two subarrays that sum to 11.
 * 
 * arr = [1] 
 * 
 * The answer is 1 since left and right sum to 0
 * 
 * You will be given arrays of integers and must determine 
 * whether there is an element that meets the criterion. 
 * If there is, return YES. Otherwise, return NO.
 * 
 * Complete the 'balancedSums' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts INTEGER_ARRAY arr as parameter.
 */

function balancedSums($arr)
{
    // Write your code here
    if (count($arr) == 1) {
        return 'YES';
    }
    /*
     * When you start checking from the first element,
     * sum_to_the_left of the first element will be 0
     * and sum_to_the_right will be the sum total of all
     * the elements in the array (total_sum) minus the first element
     */ 
    
    $total_sum = array_sum($arr);
    $sum_to_the_left = 0;
    $sum_to_the_right = $total_sum - $arr[0];
    for ($i = 0; $i < count($arr); $i++) {
        if ($sum_to_the_left == $sum_to_the_right) {
            return 'YES';
        }
        /*
         * Just before the iteration moves to the next element,
         * sum_to_the_left will now be the old sum_to_the_left plus the current element
         * sum_to_the_right will now be the old sum_to_the_right minus the next element
         */ 
        if ($i < (count($arr) - 1)) {
            $sum_to_the_left = $sum_to_the_left + $arr[$i];
            $sum_to_the_right = $sum_to_the_right - $arr[$i + 1];
        }
        
    }
    
    return 'NO';

}

$arr = [2,0,0,0];
echo balancedSums($arr);

/*
$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$T = intval(trim(fgets(STDIN)));

for ($T_itr = 0; $T_itr < $T; $T_itr++) {
    $n = intval(trim(fgets(STDIN)));

    $arr_temp = rtrim(fgets(STDIN));

    $arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

    $result = balancedSums($arr);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);

*/
?>