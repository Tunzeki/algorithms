<?php

/*
 * You are choreographing a circus show with various animals. 
 * For one act, you are given two kangaroos on a number line ready to jump in the positive direction (i.e, toward positive infinity).
 * 
 * The first kangaroo starts at location x1 and moves at a rate of v1 meters per jump.
 * The second kangaroo starts at location x2 and moves at a rate of v2 meters per jump.
 * You have to figure out a way to get both kangaroos at the same location at the same time as part of the show. 
 * If it is possible, return YES, otherwise return NO.
 * 
 * Complete the 'kangaroo' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts following parameters:
 *  1. INTEGER x1
 *  2. INTEGER v1
 *  3. INTEGER x2
 *  4. INTEGER v2
 */

function kangaroo($x1, $v1, $x2, $v2)
{
    // Write your code here
    /* 
     * If statement
     * If both kangaroos are starting at different points but moving at the same rate,
     * there's no way they will get to the same location at the same time, 
     * thus, return NO
     * 
     * Else if statement 
     * For both kangaroos to reach the same location at the same time,
     * x1 + v1y = x2 + v2y
     * Solving for y
     * x1 - x2 = v2y - v1y
     * x1 - x2 = (v2 - v1)y
     * y = (x1 - x2) / (v2 - v1)
     * Since the same of moving is a whole and in the positive direction,
     * y has to be a whole number: (x1 - x2) % (v2 - v1) == 0
     * and the result of the division positive: (x1 - x2) / (v2 - v1) > 0
     * Return YES when both conditions are true
     * 
     * Else statement
     * Else, return NO
     *  
     */ 
    if (($x1 != $x2) && ($v2 == $v1)) {
        return 'NO';
    } elseif ((($x1 - $x2) % ($v2 - $v1) == 0) && (($x1 - $x2) / ($v2 - $v1) > 0)) {
        return 'YES';
    } else {
        return 'NO';
    }
}

echo kangaroo(43, 2, 70, 2);
/*
$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$x1 = intval($first_multiple_input[0]);

$v1 = intval($first_multiple_input[1]);

$x2 = intval($first_multiple_input[2]);

$v2 = intval($first_multiple_input[3]);

$result = kangaroo($x1, $v1, $x2, $v2);

fwrite($fptr, $result . "\n");

fclose($fptr);
*/

?>