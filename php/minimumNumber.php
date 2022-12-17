<?php

/*
 * Louise joined a social networking site to stay in touch with her friends. 
 * The signup page required her to input a name and a password. 
 * However, the password must be strong. 
 * The website considers a password to be strong if it satisfies the following criteria:
 * - Its length is at least 6.
 * - It contains at least one digit.
 * - It contains at least one lowercase English character.
 * - It contains at least one uppercase English character.
 * - It contains at least one special character. The special characters are: !@#$%^&*()-+
 * 
 * She typed a random string of length n in the password field but wasn't sure if it was strong. 
 * Given the string she typed, can you find the minimum number of characters she must add to make her password strong?
 * 
 * Complete the 'minimumNumber' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER n
 *  2. STRING password
 */

function minimumNumber($n, $password)
{
    // Return the minimum number of characters to make the password strong
    // Regular expressions to check if the password contains at least one digit, lowercase, 
    // upppercase or special character
    $contains_digit = preg_match("/[0-9]+/", $password);
    $contains_lowercase = preg_match("/[a-z]+/", $password);
    $contains_uppercase = preg_match("/[A-Z]+/", $password);
    $contains_specialcharacter = preg_match("/[!@#$%^&*()+-]+/", $password);
    /*
     * Initialize strong, the number of characters needed to make the password strong to 0
     * Increment strong by 1 in each case if the password does not contain
     * at least one digit, lowercase, upppercase or special character
     */ 
    $strong = 0;
    if (!$contains_digit) {
        $strong++;
    }
    if (!$contains_lowercase) {
        $strong++;
    }
    if (!$contains_uppercase) {
        $strong++;
    }
    if (!$contains_specialcharacter) {
        $strong++;
    }
    /*
     * We also want the password to be at least 6 digits
     * If the sum of n (the length of the password) and strong is at least 6, return strong
     * Else, return (6 - n)
     * Why (6 - n)?
     * For the password to be strong, n + s + x >= 6
     * where x is the additional characters to be added, aside from strong, for the password to be at least 6 digits
     *  s + x >= 6 - n
     * Therefore, (6 - n) is what should be returned
     */ 
    if (($n + $strong) >= 6) {
        return $strong;
    } else {
        return (6 - $n);
    }
}

echo minimumNumber(7, "AUzs-nV");

/*
$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$password = rtrim(fgets(STDIN), "\r\n");

$answer = minimumNumber($n, $password);

fwrite($fptr, $answer . "\n");

fclose($fptr);
*/

?>