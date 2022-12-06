<?php

/*
 * Given an array of bird sightings where every element represents a bird type id, 
 * determine the id of the most frequently sighted type. 
 * If more than 1 type has been spotted that maximum amount, return the smallest of their ids.
 * 
 * Complete the 'migratoryBirds' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts INTEGER_ARRAY arr as parameter.
 */

function migratoryBirds($arr)
{
    // Write your code here
    // Create a copy of $arr and sort it
    $arr_copy = $arr;
    sort($arr_copy);
    // Initialize the most frequent id to be the first in the sorted array
    // and the count of the maximum element to be 1
    $most_frq_id = $arr_copy[0];
    $max_element_count = 1;
    /*
     * Loop through each element in the array.
     * For each element $i:
     *  - initialize the number of times it occurs ($current_element_count) to be 1
     *  Begin inner loop:
     *  - if the next element, $j, is the same as $i, increment $current_element_count
     *      and go to the next element ($j++), repeatedly do this, increasing $current_element_count
     *      at each point until you encounter an element $j that is not the same as $i,
     *      then, break out of the inner loop
     * Still within the outer loop:
     * - if $current_element_count is greater than $max_element_count,
     *      it means the current element is greater than the element previously set as the most frequent id,
     *      therefore, set $max_element_count as $current_element_count and most frequent id as current element, $i
     *      In case, two or more elements have the maximum count, the fact that the array is sorted in asc order 
     *      and the condition of this if statement ensures that the smallest of these elements is the most frequent id
     * - set $i = $j - 1 so as to skip all the elements after $i which are the same as $i in the next iteration
     * "$j - 1" and not $j because $j already goes to the next not-equal-to-$i element before the inner loop is broken
     *  and the increment counter in the outer for loop will still be executed (i.e $i++),
     * so the "-1" is necessary so that there won't be a skipped element
     */
    for ($i = 0; $i < count($arr_copy); $i++) {
        $current_element_count = 1;
        for ($j = $i + 1; $j < count($arr_copy); $j++) {
            if ($arr_copy[$i] == $arr_copy[$j]) {
                //break;
                $current_element_count++;
            } else {
                break;
            }
        }
        if ($current_element_count > $max_element_count) {
            $max_element_count = $current_element_count;
            $most_frq_id = $arr_copy[$i];
        }
        $i = $j - 1;
    }
    return $most_frq_id;
}
$arr = [1,2,3,4,5,4,3,2,1,3,4];
echo migratoryBirds($arr);
/*
$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$arr_count = intval(trim(fgets(STDIN)));

$arr_temp = rtrim(fgets(STDIN));

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = migratoryBirds($arr);

fwrite($fptr, $result . "\n");

fclose($fptr);
*/