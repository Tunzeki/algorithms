<?php

/*
 *
 * A pangram is a string that contains every letter of the alphabet. 
 * Given a sentence determine whether it is a pangram in the English alphabet. 
 * Ignore case. Return either pangram or not pangram as appropriate.
 * 
 * EXAMPLE
 * s = 'The quick brown fox jumps over the lazy dog'
 * The string contains all the letters in the ENglish alphabet, so return pangram
 * 
 * Complete the 'pangrams' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts STRING s as parameter.
 */

function pangrams($s)
{
    // Write your code here
    $all_alphabets = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k',
                        'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u',
                        'v', 'w', 'x', 'y', 'z'];
    // array_intersect() is case-sensitive.
    // Thus, convert the input string to lowercase to make it case-insensitive
    // Make the string into an array
    $s_as_array = str_split(strtolower($s));

    // Use array_intersect() to compare if what $all_alphabets and $s_as_array have
    // in common are all the letters in the English alphabets
    if (array_intersect($all_alphabets, $s_as_array) == $all_alphabets) {
        return "pangram";
    } else {
        return "not pangram";
    }

}

var_dump(pangrams("We promptly judged antique ivory buckles for the next prize")); 

/*
$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$s = rtrim(fgets(STDIN), "\r\n");

$result = pangrams($s);

fwrite($fptr, $result . "\n");

fclose($fptr);

*/
?>