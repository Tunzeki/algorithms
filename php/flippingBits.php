<?php

function flippingBits($n)
{
    // Convert $n into a string so you can pass it as a parameter into base_convert()
    // Use base_convert() to convert it from base 10 to 2
    $input = (string)$n;
    $b2_value = base_convert($input, 10, 2);

    // Determine the number of leading zeros you need to add to $b2_value to make it 32 digits long
    $leading_zeros = 32 - (int)strlen($b2_value);
    // Use addLeadingZeros() to add x number of leading zeros (first parameter) to y string (second parameter)
    $original_32bits = addLeadingZeros($leading_zeros, $b2_value);
    // Flip each numerical character of the 32-bit string that results
    $new_bits = flip_bits($original_32bits);
    // Convert the resulting 32-bit string from base 2 to 10
    return base_convert($new_bits, 2, 10);   
}

// Write a recursive function to add the appropriate number of leading zeros to $b2_value
function addLeadingZeros($leading_zeros, $b2_value)
{
    // Base case
    if ($leading_zeros == 0) {
        return $b2_value;
    }

    // Recursive case
    $b2_value = '0' . $b2_value;
    $leading_zeros--;
    return addLeadingZeros($leading_zeros, $b2_value);
}

// Write a function that receives a string parameter and flips 0's or 1's character 
// in the parameter 0 -> 1 and 1 -> 0
function flip_bits($original_bits)
{
    // Split each character in the input string into successive values of an array
    $split_bits = str_split($original_bits);
    // Create a variable to hold the result of the flip
    $new_bits = '';
    // Loop through the array $split_bits. Repeatedly alter the variable $new_bits 
    // changing 0 -> 1 and 1 -> 0
    foreach ($split_bits as $each_bit) {
        if ($each_bit == '0') {
            $new_bits = $new_bits . '1';
        } elseif ($each_bit == '1') {
            $new_bits = $new_bits . '0';
        }
    }
    return $new_bits . "\n";
}

echo flippingBits(9);
?>