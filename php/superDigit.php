<?php

/*
 * We define super digit of an integer x using the following rules:
 * Given an integer, we need to find the super digit of the integer.
 * - If x has only 1 digit, then its super digit is x.
 * - Otherwise, the super digit of x is equal to the super digit of the sum of the digits of x.
 * 
 * For example, the super digit of 9875 will be calculated as:
 * 
 * superDigit(9875)     9+8+7+5 = 29
 * superDigit(29)       2+9     = 11
 * superDigit(11)       1+1     = 2
 * superDigit(2)                = 2
 * 
 * Example
 * n = '9875'
 * k = 4
 * 
 * The number p is created by concatenating the string n k times
 * so the initial 
 * p = 9875987598759875
 * 
 * All of the digits of p sum to 116. 
 * The digits of 116 sum to 8
 * 8 is only one digit, so it is the super digit
 * 
 * 
 * Complete the 'superDigit' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. STRING n
 *  2. INTEGER k
 */

function superDigit($n, $k)
{
    // Write your code here
    /*
     * If p is created by concatenating the string n k times
     * and then the digits that make up p are summed together to give true_sum
     * true_sum can also be arrived at by summing the digits of n together and multiplying the result by k.
     * This method (summation and multiplication) is more efficient 
     * than doing string concatenation and summation.
     * 
     * Set m = string conversion of true_sum
     */ 
    $sum = 0;
    for ($l = 0; $l < strlen($n); $l++) {
        $sum = $sum + (int)$n[$l];
    }
    $true_sum = $sum * $k;
    $m = (string)$true_sum;
    /*
     * Add all the digits that make up m together 
     * and then add the digits that make up the result together, and so on.
     * Do this k times and return the result after the k-th time as the super digit
     * But if the result at any point during this process is a single digit:
     * return the digit as the super digit
     */ 
    for ($i = 0; $i < $k; $i++) {
        $sum = 0;
        for ($j = 0; $j < strlen($m); $j++) {
            $sum = $sum + (int)$m[$j];
        }
        $m = (string)$sum;
        if (strlen($m) == 1) {
            return $m;
        }
    }

    return $m;
}

$n = '3546630947312051453014172159647935984478824945973141333062252613718025688716704470547449723886626736';
$k = 100000;
echo superDigit($n, $k);

/*
$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$n = $first_multiple_input[0];

$k = intval($first_multiple_input[1]);

$result = superDigit($n, $k);

fwrite($fptr, $result . "\n");

fclose($fptr);
*/

?>