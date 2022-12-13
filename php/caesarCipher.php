<?php

/*
 * Julius Caesar protected his confidential information by encrypting it using a cipher. 
 * Caesar's cipher shifts each letter by a number of letters. If the shift takes you past the end of the alphabet, 
 * just rotate back to the front of the alphabet. 
 * In the case of a rotation by 3, w, x, y and z would map to z, a, b and c.
 * 
 * Complete the 'caesarCipher' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts following parameters:
 *  1. STRING s
 *  2. INTEGER k
 */

function caesarCipher($s, $k)
{
    // Write your code here
    // Make an array of small letters a - z and another one of capital A - Z
    $alphabets = range('a', 'z');
    $cap_alphabets = range('A', 'Z');

    // Add a - z or A - Z to the end of alphabets or cap_alphabets 4 more times.
    // Specifically 4 more times because 26 times 5 (times 5 cos the first 26 indexes were already present) is 130
    // and k can be a number from 0 to 100. In the largest case scenario, if it's 100, z will be rotated to the 
    // letter at index 125, so doing it 4 more times covers this but not anything less than 4
    for ($i = 0; $i < 4; $i++) {
        for ($j = 0; $j < 26; $j++) {
            $cap_alphabets[] = $cap_alphabets[$j];
            $alphabets[] = $alphabets[$j];
        }
    }

    // There are 26 letters in the English alphabets. This will not change
    // Determine what each letter will be rotated to
    // (what each letter of alphabets rotates to is the element of rotated_alphabets at the same key)
    // I will use strtoupper later to convert small letters to capital letters if I need to
    // I don't want to define a new array variable to account for rotated capital letters
    $rotated_alphabets = [];
    for ($i = 0; $i < 26; $i++) {
        $move_to = $i + $k;
        $rotated_alphabets[$i] = $alphabets[$move_to];
    }
    // Split the input string into an array so you can loop through each of its element
    // Initialize the return parameter, $output, to an empty string
    $new_array = str_split($s);
    $output = '';
    /*
     * Loop through each of the elements in new_array:
     * if it's a small letter, get the key
     *  then look for the element of rotated_alphabets at that key and add to @output
     * if it's a capital letter, get the key
     *  then look for the element of rotated_alphabets at that key, convert the element to a capital letter,
     *  and add to @output
     * else add that same element (it's not a letter of the English alphabets) to  @output
     */ 
    for ($i = 0; $i < count($new_array); $i++) {
        if (in_array($new_array[$i], $alphabets)) {
            $key = array_search($new_array[$i], $alphabets);
            $output[$i] = $rotated_alphabets[$key];
        } elseif (in_array($new_array[$i], $cap_alphabets)) {
            $key = array_search($new_array[$i], $cap_alphabets);
            $output[$i] = strtoupper($rotated_alphabets[$key]);
        } else {
            $output[$i] = $new_array[$i];
        }
    }
    return $output;

}

var_dump(caesarCipher("www.abc.xy", 87));

/*
$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$s = rtrim(fgets(STDIN), "\r\n");

$k = intval(trim(fgets(STDIN)));

$result = caesarCipher($s, $k);

fwrite($fptr, $result . "\n");

fclose($fptr);
*/

?>