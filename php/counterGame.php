<?php

/*
 * Louise and Richard have developed a numbers game. 
 * They pick a number and check to see if it is a power of 2. 
 * If it is, they divide it by 2. If not, they reduce it by the next lower number which is a power of 2. 
 * Whoever reduces the number to 1 wins the game. Louise always starts.
 * 
 * Given an initial value, determine who wins the game.
 * 
 * Update: If they initially set counter to 1, Richard wins. 
 * Louise cannot make a move so she loses.
 * 
 * Complete the 'counterGame' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts LONG_INTEGER n as parameter.
 */

function counterGame($n) {
    // Write your code here
    // If they initially set counter to 1, Richard wins.
    if ($n == 1) {
        return 'Richard';
    }
    /**
     * Form an array containing the powers of 2
     * up to or just after $n
     */
    $powers_of_2 = [1];
    for ($i = 1; $i <= 64; $i++) {
        $powers_of_2[$i] = 2**$i;
        if ((2**$i) >= $n ) {
            break;  
        }
    }
    $power_to_check = count($powers_of_2) - 1;
    /**
     * Number of plays is $i
     * 
     * If $n is a power of 2, divide it by 2
     * If $n is not a power of 2, 
     * - find the power of 2 that is just less than $n ($powers_of_2[$j-1])
     * - reduce $n by this number
     * 
     * If number of plays is odd when $n becomes 1, return 'Loiuse'
     * otherwise, return 'Richard'
     *   
     */
    for ($i = 1; $i <= 64; $i++) {
        if (in_array($n, $powers_of_2)) {
            $n = $n / 2;
            
        } else {
            for ($j = $power_to_check; $j > 0; $j--) {
                $power_to_check--;
                if ($powers_of_2[$j] > $n && $powers_of_2[$j-1] < $n) {
                    $n = $n - $powers_of_2[$j-1];
                    break;
                }
            }

        }
        if ($n == 1) {
            if ($i % 2 == 0) {
                return 'Richard';
            } else {
                return 'Louise';
            }
        }
    }

}

/*
$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$t = intval(trim(fgets(STDIN)));

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    $n = intval(trim(fgets(STDIN)));

    $result = counterGame($n);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);

*/

?>