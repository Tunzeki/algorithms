<?php

/*
 *
 * Comparison Sorting
 * 
 * Quicksort usually has a running time of n × log(n), 
 * but is there an algorithm that can sort even faster? In general, this is not possible. 
 * Most sorting algorithms are comparison sorts, i.e. they sort a list just by comparing the elements to one another. 
 * A comparison sort algorithm cannot beat n × log(n) (worst-case) running time, 
 * since n × log(n) represents the minimum number of comparisons needed to know where to place each element. 
 * For more details, you can see these notes (PDF): http://www.cs.cmu.edu/~avrim/451f11/lectures/lect0913.pdf.
 * 
 * Alternative Sorting
 * 
 * Another sorting method, the counting sort, does not require comparison. 
 * Instead, you create an integer array whose index range covers the entire range of values in your array to sort. 
 * Each time a value occurs in the original array, you increment the counter at that index. 
 * At the end, run through your counting array, printing the value of each non-zero valued index that number of times.
 * 
 * 
 * Complete the 'countingSort' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts INTEGER_ARRAY arr as parameter.
 * 
 * 
 * 
 */

function countingSort($arr)
{
    /*
     *
     * It's easier to understand how the algorithm works as code 
     * by looking at this example carefully:
     * 
     * arr = [1, 1, 3, 2, 1]
     * 
     * All of the values are in the range [0...3], so create an array of zeros.
     * result = [0, 0, 0, 0]. 
     * 
     * The results of each iteration follow:
     * 
     * i    arr[i]      result
     * 0    1           [0, 1, 0, 0]         
     * 1    1           [0, 2, 0, 0]
     * 2    3           [0, 2, 0, 1]
     * 3    2           [0, 2, 1, 1]
     * 4    1           [0, 3, 1, 1]
     * 
     * 
     * In this challenge, the frequency array should have 100 zeros at the beginning.
     */
    $frequency_array = array_fill(0, 100, 0);
    for ($i = 0; $i < count($arr); $i++) {
        $frequency_array[$arr[$i]] = $frequency_array[$arr[$i]] + 1;
    }
    return $frequency_array;

}


/*
$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$arr_temp = rtrim(fgets(STDIN));

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = countingSort($arr);

fwrite($fptr, implode(" ", $result) . "\n");

fclose($fptr);

*/


?>