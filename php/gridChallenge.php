<?php

/*
 * Given a square grid of characters in the range ascii[a-z], 
 * rearrange elements of each row alphabetically, ascending. 
 * Determine if the columns are also in ascending alphabetical order, top to bottom. 
 * Return YES if they are or NO if they are not.
 * 
 * Complete the 'gridChallenge' function below.
 *
 * Example
 * 
 * grid = ['abc', 'ade', 'efg']
 * 
 * The grid is illustrated below
 * 
 *      a   b   c
 *      a   d   e
 *      e   f   g
 * 
 * The rows are already in alphabetical order. 
 * The columns a a e, b d f and c e g are also in alphabetical order, so the answer would be YES. 
 * Only elements within the same row can be rearranged. They cannot be moved to a different row.
 *  
 * The function is expected to return a STRING.
 * The function accepts STRING_ARRAY grid as parameter.
 */

function gridChallenge($grid)
{
    // Write your code here
    $grid_copy = $grid;
    /*
     * Essentially, the row of a grid is one element of the input array
     * So, the first thing is to be able to sort the letters that 
     * make up this element in alphabetical order
     * The for loop below achieves this:
     * - Split the letters of the element, grid_copy[i] into elements of an array (str)
     * - Sort this array (this arranges the elements in alphabetical order)
     * - Join the elements together as a string, temp_element, using an inner for loop
     * - Set grid_copy[i] to temp_element 
     */ 
    for ($i = 0; $i < count($grid_copy); $i++) {
        $str = str_split($grid_copy[$i]);
        sort($str);
        $temp_element = '';
        for ($j = 0; $j < count($str); $j++) {
            $temp_element = $temp_element . $str[$j];
        }
        $grid_copy[$i] = $temp_element;
    }
    /*
     * The next thing is to check if the letters that make
     * up each column are sorted alphabetically
     * If not, return NO:
     *  You can do this by comparing the numeric key of the first letter 
     *  of the column with the second, and the second with the third, and so on
     *  using the natural keys of the letters in the alphabet as reference.
     */ 
    $alphabets = range('a', 'z');
    for ($i = 0; $i < count($grid_copy); $i++) {
        for ($j = 0; $j < (count($grid_copy) - 1); $j++) {
            if (array_search($grid_copy[$j][$i], $alphabets) > array_search($grid_copy[$j + 1][$i], $alphabets)) {
                return 'NO';
            }
        }
    }
    return 'YES';
}

/*

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$t = intval(trim(fgets(STDIN)));

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    $n = intval(trim(fgets(STDIN)));

    $grid = array();

    for ($i = 0; $i < $n; $i++) {
        $grid_item = rtrim(fgets(STDIN), "\r\n");
        $grid[] = $grid_item;
    }

    $result = gridChallenge($grid);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);

*/

?>