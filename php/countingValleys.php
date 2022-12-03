<?php

/*
 *
 * An avid hiker keeps meticulous records of their hikes. 
 * During the last hike that took exactly `steps` steps, 
 * for every step it was noted if it was an uphill, U, or a downhill, D step. 
 * Hikes always start and end at sea level, and each step up or down represents a 1 unit change in altitude. 
 * We define the following terms:
 * - A mountain is a sequence of consecutive steps above sea level, 
 *   starting with a step up from sea level and ending with a step down to sea level.
 * - A valley is a sequence of consecutive steps below sea level, starting with a step down from sea level 
 *   and ending with a step up to sea level.
 * 
 * Given the sequence of up and down steps during a hike, 
 * find and print the number of valleys walked through.
 * 
 * Example
 * steps = 8
 * path = DDUUUUDD
 * 
 * The hiker first enters a valley 2 units deep. 
 * Then they climb out and up onto a mountain 2 units high. 
 * Finally, the hiker returns to sea level and ends the hike.
 * The hiker walked through 1 valley.


 * Complete the 'countingValleys' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER steps
 *  2. STRING path
 */

function countingValleys($steps, $path)
{
    // Write your code here
    $vector = 0;
    $valley_count = 0;
    for ($i = 0; $i < $steps; $i++) {
        if ($path[$i] == "D") {
            // A new valley is entered only when the vector changes from 0 to -1
            if ($vector == 0) {
                $valley_count++;
            }
            $vector--;
        } elseif ($path[$i] == "U") {
            $vector++;
        }
    }
    return $valley_count;

}

/*
$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$steps = intval(trim(fgets(STDIN)));

$path = rtrim(fgets(STDIN), "\r\n");

$result = countingValleys($steps, $path);

fwrite($fptr, $result . "\n");

fclose($fptr);

*/

?>