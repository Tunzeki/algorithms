<?php

/*
 *
 * Two children, Lily and Ron, want to share a chocolate bar. 
 * Each of the squares has an integer on it.
 * Lily decides to share a contiguous segment of the bar selected such that:
 *  - The length of the segment matches Ron's birth month, and,
 *  - The sum of the integers on the squares is equal to his birth day.
 * Determine how many ways she can divide the chocolate.
 * 
 * 
 * Complete the 'birthday' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER_ARRAY s
 *  2. INTEGER d
 *  3. INTEGER m
 */

function birthday($s, $d, $m)
{
    // Let bars be the number of ways she can divide the chocolate and initialize this to 0
    $bars = 0;
    /*
     * Outer for loop should only run when there are 
     * at least m numbers remaining.
     * This is true while i <= count(new_s) - m
     */
    for ($i = 0; $i <= (count($s) - $m); $i++) {
        /*
        * Because we will be adding m contiguous integers in the array together,
        * initialize the sum of any m contiguous integers to 0 before you begin the addition
        * Set j = i. 
        * This is because for any integer in the array, you want to add m-1 integers 
        * that follow it to it using an inner loop. But you don't want to move the iterator i
        * in the outer loop forward while doing this. Thus, set j = i and use j instead in the 
        * inner loop
        * 
        * Inner loop: 
        * You want to add m integers in the array together.
        * Therefore, start k at 1, increasing it by 1 after each iteration until you
        * have added m integers
        * If at any point during this addition, the sum > d, break out of the outer loop
        *  and go to the next integer in the outer loop to repeat the steps
        */
        $sum = 0;
        $j = $i;
        for ($k = 1; $k <= $m; $k++) {
            if ($sum > $d) {
                break;
            }
            $sum = $sum + $s[$j];
            $j++;
        }
        /*
        * Back to the outer loop, 
        * If sum = d, increment bars by 1
        * 
        */
        if ($sum == $d) {
            $bars++;
        }

    }
    // Return bars when the execution of the outer loop is complete
    return $bars;

}

$s =  [2, 2, 1, 3, 2];
echo birthday($s, 4, 2);
/*
$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$s_temp = rtrim(fgets(STDIN));

$s = array_map('intval', preg_split('/ /', $s_temp, -1, PREG_SPLIT_NO_EMPTY));

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$d = intval($first_multiple_input[0]);

$m = intval($first_multiple_input[1]);

$result = birthday($s, $d, $m);

fwrite($fptr, $result . "\n");

fclose($fptr);
*/

?>