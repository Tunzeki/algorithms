<?php
/* Enter your code here. Read input from STDIN. Print output to STDOUT */
/*
 *
 * In this challenge, the task is to debug the existing code to successfully execute all provided test files.
 * 
 * Given two strings consisting of digits 0 and 1 only, find the XOR of the two strings.
 * 
 * XOR means Exclusive OR. 
 * 'The truth table of A XOR B shows that it outputs true whenever the inputs differ' (Wikipedia).
 * 
 * Debug the given function strings_xor to find the XOR of the two given strings appropriately.
 * Note: You can modify at most three lines in the given code and you cannot add or remove lines to the code.
 * 
 */ 

function strings_xor($_fp)
{
    $lines = [];
    if ($_fp) {
        while (($buffer = fgets($_fp)) !== false) {
            $lines[] = $buffer;
        }
        $xor = '';
        // There seems to be a space at the end of each line of the input string
        // This space is the last element of the new array created using str_split
        $str1 = str_split($lines[0]);
        $str2 = str_split($lines[1]);
        // count($str1) - 2 so as to ignore the last element of each array (a space)
        // Use count($str1) - 1 on HackerRank
        for ($i = 0; $i < (count($str1) - 2); $i++) {
            if ($str1[$i] == $str2[$i]) {
                $xor = $xor . '0';
            } else {
                $xor = $xor . '1';
            }
        }
        if (!feof($_fp)) {
            echo "Error: unexpected fgets() fail\n";
        }
        fclose($_fp);
        return $xor;
    }
}

$_fp = fopen("C:\Users\HP\Documents\web-apps\algorithms\php/test.txt", "r");
$xor = strings_xor($_fp);
$new_file = fopen("C:\Users\HP\Documents\web-apps\algorithms\php/test2.txt", "w");
fwrite($new_file, $xor . "\n");
fclose($new_file);
