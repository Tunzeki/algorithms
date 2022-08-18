<?php
/*
 * There is a collection of input strings and a collection of query strings. 
 * For each query string, determine how many times it occurs in the list of input strings. 
 * Return an array of the results.
 * 
 * Example
 * strings = [ab, ab, abc]
 * queries = [ab, abc, bc]
 * 
 * There are 2 instances of ab, 1 of abc and 0 of bc
 * For each query, add an element to the return array
 * results = [2, 1, 0]
 * 
 * Complete the 'matchingStrings' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts following parameters:
 *  1. STRING_ARRAY strings
 *  2. STRING_ARRAY queries
 */

function matchingStrings($strings, $queries)
{
    // Initialize the output to an empty array
    $results = [];
    // For each element i in queries:
    // Set the value of the index of that element in results to 0
    // Loop through each element j in strings
    // If the element i in queries is the same as the current element j in strings
    // Increment the value of results[$i] by 1 
    for ($i = 0; $i < count($queries); $i++) {
        $results[$i] = 0;
        for ($j = 0; $j < count($strings); $j++) {
            if ($queries[$i] == $strings[$j]) {
                $results[$i]++;
            }
        }
    }
    return $results;
}

/*
 * Comment out HackerRank Code
$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$strings_count = intval(trim(fgets(STDIN)));

$strings = array();

for ($i = 0; $i < $strings_count; $i++) {
    $strings_item = rtrim(fgets(STDIN), "\r\n");
    $strings[] = $strings_item;
}

$queries_count = intval(trim(fgets(STDIN)));

$queries = array();

for ($i = 0; $i < $queries_count; $i++) {
    $queries_item = rtrim(fgets(STDIN), "\r\n");
    $queries[] = $queries_item;
}

$res = matchingStrings($strings, $queries);

fwrite($fptr, implode("\n", $res) . "\n");

fclose($fptr);
*/

$strings = ['aba', 'baba', 'aba', 'xzxb'];
$queries = ['aba', 'xzxb', 'ab'];
var_dump(matchingStrings($strings, $queries)); 
/* 
array(3) {
  [0]=>
  int(2)
  [1]=>
  int(1)
  [2]=>
  int(0)
} 
or simply, [2, 1, 0]
*/
echo "\n";
$strings = ['def', 'de', 'fgh'];
$queries = ['de', 'lmn', 'fgh'];
var_dump(matchingStrings($strings, $queries));
/* 
array(3) {
  [0]=>
  int(1)
  [1]=>
  int(0)
  [2]=>
  int(1)
}
or simply, [1,0,1]
*/

?>