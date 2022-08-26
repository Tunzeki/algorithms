<?php
/*
Camel Case is a naming style common in many programming languages. 
In Java, method and variable names typically start with a lowercase letter, 
with all subsequent words starting with a capital letter (example: startThread). 
Names of classes follow the same pattern, except that they start with a capital letter (example: BlueCar).

Your task is to write a program that creates or splits Camel Case variable, method, and class names.

Input Format
- Each line of the input file will begin with an operation (S or C) 
followed by a semi-colon followed by M, C, or V followed by a semi-colon followed by the words 
you'll need to operate on.
- The operation will either be S (split) or C (combine)
- M indicates method, C indicates class, and V indicates variable
- In the case of a split operation, the words will be a camel case method, class or variable name 
that you need to split into a space-delimited list of words starting with a lowercase letter.
- In the case of a combine operation, the words will be a space-delimited list of words 
starting with lowercase letters that you need to combine into the appropriate camel case String. 
Methods should end with an empty set of parentheses to differentiate them from variable names.

Output Format
For each input line, your program should print either the space-delimited list of words 
(in the case of a split operation) or the appropriate camel case string (in the case of a combine operation).

Input
S;M;plasticCup()

C;V;mobile phone

C;C;coffee machine

S;C;LargeSoftwareBook

C;M;white sheet of paper

S;V;pictureFrame

Output
plastic cup

mobilePhone

CoffeeMachine

large software book

whiteSheetOfPaper()

picture frame
*/

function extractData($input, $data = '') {
    for ($i = 4; $i < strlen($input); $i++) {
        $data = $data . $input[$i];
    }
    return $data;
}
function removeBrackets($method, $string = '') {
    // strlen($method) - 4 because each method is on a line and it ends with ()\n
    for ($i = 0; $i < (strlen($method) - 4); $i++) {
        $string = $string . $method[$i];
    }
    return $string . "\n";
}
function addBrackets($method) {
    // Since the input is a file, each line ends with the \n, 
    // hence I added the bracket before the newline syntax to make sure 
    // the brackets do not spill over to the next line
    $method[-2] = '(';
    $method[-1] = ')';
    return $method . "\n";
}
function split($what, $result = '') {
    for ($i = 0; $i < strlen($what); $i++) {
        if (preg_match('/[A-Z]/', $what[$i]) && $i !== 0) {
            $result = $result . ' ' . $what[$i];
        } else {
            $result = $result . $what[$i];
        }
    }
    return $result;
}
function combine($what, $result = '') {
    for ($i = 0; $i < strlen($what); $i++) {
        if (preg_match('/ /', $what[$i])) {
            $what[$i+1] = strtoupper($what[$i+1]);
        } else {
            $result = $result . $what[$i];
        }
    }
    return $result;
}
function camelCase ($input) {
    $temp = extractData($input);
    if ($input[0] === 'S') {
        if ($input[2] === 'M') {
            $word = removeBrackets($temp);
            return strtolower(split($word));
        } else {
            return strtolower(split($temp));
        }    
    } else {
        if ($input[2] === 'M') {
            $word = addBrackets($temp);
            return combine($word); 
        } elseif($input[2] === 'V') {
            return combine($temp);
        } else {
            return ucfirst(combine($temp));
        }   
    }
}

$lines = [];
$_fp = fopen("camelcase.txt", "r");
if ($_fp) {
    while (($buffer = fgets($_fp)) !== false) {
        $lines[] = $buffer;
        echo camelCase($buffer);
    }
    if (!feof($_fp)) {
        echo "Error: unexpected fgets() fail\n";
    }
    fclose($_fp);
}

?>