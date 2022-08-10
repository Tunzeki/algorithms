<?php
/*
 * Complete the 'timeConversion' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts STRING s as parameter.
 * 
 * Given a time in 12-hour AM/PM format, convert it to military (24-hour) time.
 * Note: - 12:00:00AM on a 12-hour clock is 00:00:00 on a 24-hour clock.
 * - 12:00:00PM on a 12-hour clock is 12:00:00 on a 24-hour clock.
 * 
 * Example
 * s = '12:01:00PM' 
 * Return '12:01:00'
 * 
 * s = '12:01:00AM'
 * Return '00:01:00'
 */

function timeConversion($s)
{
    // Take the 12-hour clock format and convert to 24-hour clock format
    $time = new DateTime($s);
    return $time->format('H:i:s');
}

/*
 * Comment out original HackerRank code
 * 
 * $fptr = fopen(getenv("OUTPUT_PATH"), "w");
 * 
 * $s = rtrim(fgets(STDIN), "\r\n");
 * 
 * $result = timeConversion($s);
 * 
 * fwrite($fptr, $result . "\n");
 * 
 * fclose($fptr);
 */
$s = '12:40:22AM';
echo timeConversion($s) . "\n"; // 00:40:22

$s = '07:05:45PM';
echo timeConversion($s); // 19:05:45