<?php
/*
 * Given a number n, for each integer i in the range from 1 to n inclusive,
 * print one value per line as follows:
 * 
 * If i is a multiple of both 3 and 5, print FizzBuzz.
 * If i is a multiple of 3 (but not 5), print Fizz.
 * If i is a multiple of 5 (but not 3), print Buzz.
 * If i is not a multiple of 3 or 5, print the value of i.
 * 
 * Complete the 'fizzBuzz' function below.
 *
 * The function accepts INTEGER n as parameter.
 */

function fizzBuzz($n)
{
    // Write your code here
    for ($i = 1; $i <= $n; $i++) {
        if ($i % 3 === 0 && $i % 5 === 0) {
            echo "FizzBuzz" . "\n";
        } elseif ($i % 3 === 0) {
            echo "Fizz" . "\n";
        } elseif ($i % 5 === 0) {
            echo "Buzz" . "\n";
        } else {
            echo $i . "\n";
        }
    }
}

// $n = intval(trim(fgets(STDIN)));

$n = 15;
fizzBuzz($n);
