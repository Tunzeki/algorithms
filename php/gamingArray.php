<?php

/**
 * Andy wants to play a game with his little brother, Bob. 
 * The game starts with an array of distinct integers and the rules are as follows:
 * - Bob always plays first.
 * - In a single move, a player chooses the maximum element in the array. 
 *   He removes it and all elements to its right. 
 *   For example, if the starting array arr = [2,3,5,4,1], then it becomes arr' = [2,3] after removing [5,4,1].
 * - The two players alternate turns.
 * - The last player who can make a move wins.
 * 
 * Andy and Bob play g games. Given the initial array for each game, 
 * find and print the name of the winner on a new line. If Andy wins, print ANDY; if Bob wins, print BOB.
 * 
 * To continue the example above, in the next move Andy will remove 3. 
 * Bob will then remove 2 and win because there are no more integers to remove.
 * 
 * Complete the 'gamingArray' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts INTEGER_ARRAY arr as parameter.
 */

function gamingArray($arr)
{
    // Write your code here
    $arr_copy = $sorted = $arr;
    sort($sorted);
    /**
     * In all cases, Bob plays first, so Bob plays odd-numbered turns
     * while Andy plays even-numbered turns
     * 
     * If the input array is already sorted,
     * then the last play is equal to the count of the array
     * and the last player until array becomes empty wins
     * If the last play is even-numbered, return ANDY
     * else return BOB
     * This approach to determine the winner for an already sorted input array
     * is more efficient than doing a for loop (as written below) 
     * which will achieve the same result but more slower
     */
    if ($sorted === $arr) {
        if (count($arr) % 2 == 0) {
            return 'ANDY';
        } else {
            return 'BOB';
        }
    }
    /**
     * Do a for loop where the input array is not already sorted
     * In each iteration, determine the position/index/key of the greatest element in the array
     * Use array_slice to set $arr_copy to all elements from position 0 up to but not including the greatest element
     * count($arr_copy) will reduce at each iteration
     * When count($arr_copy) becomes 0:
     * - Check if the number of play so far is even or odd
     * - If even, Andy is the last player and winner of the game
     * - Else, Bob is the winner
     * 
     */
    for ($i = 1; $i <= count($arr); $i++) {
        $max_position = array_search(max($arr_copy), $arr_copy);
        $arr_copy = array_slice($arr_copy, 0, $max_position);
        if (count($arr_copy) == 0) {
            if ($i % 2 == 0) {
                return 'ANDY';
            } else {
                return 'BOB';
            }
        }
    }

}

echo gamingArray([1, 3, 5, 7, 9]);

/*
$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$g = intval(trim(fgets(STDIN)));

for ($g_itr = 0; $g_itr < $g; $g_itr++) {
    $arr_count = intval(trim(fgets(STDIN)));

    $arr_temp = rtrim(fgets(STDIN));

    $arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

    $result = gamingArray($arr);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);

*/
?>