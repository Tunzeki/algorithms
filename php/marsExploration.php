<?php

/*
 * A space explorer's ship crashed on Mars! They send a series of SOS messages to Earth for help.
 * 
 * Letters in some of the SOS messages are altered by cosmic radiation during transmission. 
 * Given the signal received by Earth as a string, s, 
 * determine how many letters of the SOS message have been changed by radiation.
 * 
 * EXAMPLE
 * s = 'SOSTOT'
 * The original message was SOSSOS. Two of the message's characters were changed in transit.
 * 
 * Complete the 'marsExploration' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts STRING s as parameter.
 */

function marsExploration($s)
{
    // Write your code here
    // Split the input string into an array with each element being three letters
    $sos = str_split($s, 3);
    $altered_letters = 0;
    for ($i = 0; $i < count($sos); $i++) {
        // Each element in the $sos array is made up of three strings
        // If the first letter of the string isn't S 
        // or the second isn't O
        // or the third isn't S
        // increment the count of $altered_letters in each of those instances
        if ($sos[$i][0] != 'S') {
            $altered_letters++;
        }
        if ($sos[$i][1] != 'O') {
            $altered_letters++;
        }
        if ($sos[$i][2] != 'S') {
            $altered_letters++;
        }
        return $altered_letters;
    }

}

/*
$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$s = rtrim(fgets(STDIN), "\r\n");

$result = marsExploration($s);

fwrite($fptr, $result . "\n");

fclose($fptr);
*/

?>