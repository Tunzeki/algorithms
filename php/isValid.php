<?php

/**
 * Turing Coding Challenge Practice Test Problem 2
 * 
 * Given a string s containing just the characters '(', ')',
 * '[', ']', '{', and '}', determine if the input string is valid
 * 
 * An input string is valid if:
 * - Open brackets must be closed by the same type of brackets
 * - Open brackets must be closed in the correct order
 * 
 */

function removeAdjacentBrackets($s, $i) {
    $all = str_split($s);
    $before = array_slice($all, 0, $i);
    $after = array_slice($all, $i + 2);
    $arr = array_merge($before, $after);
    return implode($arr);
}

function isValid ($s)
{
    if (strlen($s) % 2 != 0) {
        return 'invalid';
    }

    if ($s[0] == ')' || $s[0] == ']' || $s[0] == '}') {
        return 'invalid';
    }

    for ($i = 0; $i < strlen($s); $i++) {
        if (($s[$i] ==  '(' && $s[$i + 1] == ')') || ($s[$i] ==  '[' && $s[$i + 1] == ']') || ($s[$i] ==  '{' && $s[$i + 1] == '}')) {
            $s = removeAdjacentBrackets($s, $i);
            if (strlen($s) == 0) {
                return 'valid';
            } else {
                if ($i - 1 >= 0) {
                    // $i - 2 because the counter will still increment $i by 1 in the next iteration
                    $i = $i - 2;
                } else {
                    // By setting $i to -1, it will return to 0 after the counter increments it by 1 
                    // in the next iteration
                    $i = -1;
                }
            }
        } 
    }
    return 'invalid';
}

echo isValid('()') . "\n";
echo isValid('()[]{}') . "\n";
echo isValid('(]') . "\n";
echo isValid('([)]') . "\n";
echo isValid('{[]}') . "\n";
?>