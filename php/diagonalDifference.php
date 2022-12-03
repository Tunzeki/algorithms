<?php

/*
 * Complete the 'diagonalDifference' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts 2D_INTEGER_ARRAY arr as parameter.
 *  11 2 4
    4  5 6
    10 8 -12
 */

function diagonalDifference($arr)
{
    /*
     *
     * The code I've commented out below works if you're interested in reading a three-dimensional matrix 
     * from a file and finding its diagonal difference but it isn't what the coding challenge is about.
     * 
     */
    /* 
    $file = fopen('C:\Users\HP\Documents\web-apps\algorithms\php\test.txt', 'r');
    if ($file) {
        // Create an empty array that will contain each element of the matrix
        $matrix_elements = [];
        while (($buffer = fgets($file)) !== false) {
            // echo $buffer;
            // A three-dimensional matrix will contain two spaces - one between the first and second numbers
            // of each row and the other between the second and third.
            // Each row is a line and the data type of each line is string.
            // Determine the string position of the two spaces between the numbers 
            $first_space_pos = strpos($buffer, ' ');
            $second_space_pos = strpos($buffer, ' ', $first_space_pos + 1);
            $last_space_pos = strrpos($buffer, ' ');
            if (($second_space_pos - $first_space_pos) == 1) {
                //$a00 = $buffer[$first_space_pos + 1]
            }
            $a00 = $a01 = $a02 = '';
            $a10 = $a11 = $a12 = '';
            $a20 = $a21 = $a22 = '';

            /*
             *
             *      |a00 a01 a02|
             *      |a10 a11 a12|
             *      |a20 a21 a22| 
             * 
             *      |0th 1st 2nd|
             *      |3rd 4th 5th|
             *      |6th 7th 8th|  
             */

            /*
            // Get the first number on a line
            for ($i = 0; $i < $first_space_pos; $i++) {
                $a00 = $a00 . $buffer[$i];
            }
            // Put the number in the array
            $matrix_elements[] = (int)$a00;

            // Get the second number on a line
            for ($i = $first_space_pos+1; $i < $second_space_pos; $i++) {
                $a11 = $a11 . $buffer[$i];
            }
            // Put the number in the array
            $matrix_elements[] = (int)$a11;

            // Get the third number on a line
            for ($i = $second_space_pos + 1; $i <= strlen($buffer); $i++) {
                $a22 = $a22 . $buffer[$i];
            }
            // Put the number in the array
            $matrix_elements[] = (int)$a22;
        }
        if (!feof($file)) {
            echo "Error: unexpected fgets() fail\n";
        }
        fclose($file);
    }
    $diagonal_diff = ($matrix_elements[0] + $matrix_elements[4] + $matrix_elements[8]) - ($matrix_elements[2] + $matrix_elements[4] + $matrix_elements[6]);
    return abs($diagonal_diff);

    */

    /*
     *      |0th 1st 2nd|
     *      |3rd 4th 5th|
     *      |6th 7th 8th|  
    */

    // $arr = [0 => [0, 1, 9], 1 => [3, 4, 5], 2 => [6, 7, 8]];
    // The first diagonal of any square matrix is got by incrementing the row and column sequentially
    // i.e. [row][col] -> [0][0], [1][2], [2][2], ...
    $first_diagonal = [];
    for ($i=0; $i<count($arr); $i++) {
        $first_diagonal[] = $arr[$i][$i];
    }
    $first_diagonal_sum = array_sum($first_diagonal);

    // The other diagonal of any square array is got by incrementing the row and decrementing the column sequentially
    // i.e. [row][col] -> [0][last_col], [1][last_col - 1], [2][last_col -2], ...
    $second_diagonal = [];
    $last_col = count($arr) - 1;
    for ($i = 0; $i < count($arr); $i++) {
        $second_diagonal[] = $arr[$i][$last_col];
        $last_col--;
    }
    $second_diagonal_sum = array_sum($second_diagonal);

    $diagonal_difference = $first_diagonal_sum - $second_diagonal_sum;
    return abs($diagonal_difference);

}
echo diagonalDifference($arr);

/*

$filetr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$arr = array();

for ($i = 0; $i < $n; $i++) {
    $arr_temp = rtrim(fgets(STDIN));

    $arr[] = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));
}

$result = diagonalDifference($arr);

fwrite($filetr, $result . "\n");

fclose($filetr);
*/
?>
