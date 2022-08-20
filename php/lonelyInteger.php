<?php
/*
 * Given an array of integers, where all elements but one occur twice, find the unique element.
 * 
 * Example
 * a = [1,2,3,4,3,2,1]
 * The unique element is 4
 * 
 * Complete the 'lonelyinteger' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts INTEGER_ARRAY a as parameter.
 */

function lonelyinteger($a)
{
    /*
     * First, sort the array from smallest integer to the largest
     * Then loop through the array
     * Since each iteration of i will be if a[i] !== a[i+1],
     * jump to i + 2 at the next iteration and recheck the condition.
     * The array is sorted and the total number of elements is odd,
     * Starting from the first element, 
     * if an element is not the last in the array
     * and it is not same as the next, 
     * then it is unique, return a[i]
     * elseif the element is the last, return a[i]
     *
     */
    sort($a);
    for ($i = 0; $i < count($a); $i = $i + 2) {
        if ($i !== count($a) - 1 && $a[$i] !== $a[$i + 1]) {
            return $a[$i];
        } elseif ($i === count($a) - 1) {
            return $a[$i];
        }
    }
}

/*
$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$a_temp = rtrim(fgets(STDIN));

$a = array_map('intval', preg_split('/ /', $a_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = lonelyinteger($a);

fwrite($fptr, $result . "\n");

fclose($fptr);
*/

$a = [1, 2, 3, 4, 3, 2, 1];
echo lonelyinteger($a); // 4
