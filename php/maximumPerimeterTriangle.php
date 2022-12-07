<?php

/*
 * Given an array of stick lengths, 
 * use 3 of them to construct a non-degenerate triangle with the maximum possible perimeter. 
 * Return an array of the lengths of its sides as 3 integers in non-decreasing order.
 * 
 * If there are several valid triangles having the maximum perimeter:
 * - Choose the one with the longest maximum side.
 * - If more than one has that maximum, choose from them the one with the longest minimum side.
 * - If more than one has that maximum as well, print any one them.
 * If no non-degenerate triangle exists, return [-1].
 * 
 * 
 * From Quora: https://www.quora.com/What-is-a-non-degenerate-triangle
 * If a, b, and c are the lengths of the three sides of a nondegenerate triangle, then
 * a+b>c
 * a+c>b
 * b+c>a
 * If any one of these inequalities is not true, then we get a degenerate triangle.
 * 
 * 
 * Complete the 'maximumPerimeterTriangle' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts INTEGER_ARRAY sticks as parameter.
 * 
 */

function maximumPerimeterTriangle($sticks)
{
    // Write your code here
    /*
     * Sort the array in ascending order
     * Loop through the array starting with the biggest (the last stick in the array)
     * Check if the sum of the two sticks just before it (i.e the two sticks immediately smaller than it)
     * is bigger than the biggest stick
     * - If yes, the three sticks form a nondegenerate triangle, return them as an array in ascending order
     * - If not, go to the stick just smaller than this (i.e. the stick immediately smaller than the one in the just concluded iteration)
     *      and repeat the iteration
     * Once there are less than three sticks remaining (hence the need for the condition i >= 2)
     * and a nondegenerate triangle has not been found,
     * it means the array does not contain a nondegenerate triangle, return [-1]
     */ 
    $sticks_copy = $sticks;
    sort($sticks_copy);
    for ($i = (count($sticks_copy) - 1); $i  >= 2; $i--) {
        if (($sticks_copy[$i - 2] + $sticks_copy[$i - 1]) > $sticks_copy[$i]) {
            $nondegenerate_triangle = [$sticks_copy[$i-2], $sticks_copy[$i-1], $sticks_copy[$i]];
            return $nondegenerate_triangle;
        }

    }
    return [-1];

}

$sticks = [1,2,3,4,5,10];
var_dump(maximumPerimeterTriangle($sticks));

/*
$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$sticks_temp = rtrim(fgets(STDIN));

$sticks = array_map('intval', preg_split('/ /', $sticks_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = maximumPerimeterTriangle($sticks);

fwrite($fptr, implode(" ", $result) . "\n");

fclose($fptr);
*/
?>