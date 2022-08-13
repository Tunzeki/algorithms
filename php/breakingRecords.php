<?php
/*
 * Description of the Challenge:
 * 
 * Maria plays college basketball and wants to go pro. 
 * Each season she maintains a record of her play. 
 * She tabulates the number of times she breaks her season record for most points and least points in a game. 
 * Points scored in the first game establish her record for the season, and she begins counting from there.
 * 
 * Example
 * scores = [12, 24, 10, 24]
 * 
 * Given the scores for a season, 
 * determine the number of times Maria breaks her records for most and least points scored during the season.
 * 
 * Return an array with the numbers of times she broke her records. 
 * Index 0 is for breaking most points records, and index 1 is for breaking least points records.
 * 
 * In the example above [1, 1] is returned
 * 
 * Complete the 'breakingRecords' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts INTEGER_ARRAY scores as parameter.
 * 
 */

function breakingRecords($scores)
{
    // Set the max and min scores to the score in the first game
    $max = $min = $scores[0];
    // Set records broken to [0, 0] i.e. 'no of max record broken' => 0, 'no of min record broken' => 0
    $records = [0, 0];
    /* 
     * Loop through the games played starting with the second.
     * If the score in the current game is greater than max score,
     * increment record[0] i.e. 'no of max record broken' by 1
     * and set max score to score in current game.
     * If the score in the current game is lesser than min score,
     * increment record[1] i.e. 'no of min record broken' by 1
     * and set min score to score in current game.  
     */
    for ($game = 1; $game < count($scores); $game++) {
        if ($scores[$game] > $max) {
            $records[0]++;
            $max = $scores[$game];
        } elseif ($scores[$game] < $min) {
            $records[1]++;
            $min = $scores[$game];
        }
    }

    return $records;
}

/* Comment out the following lines of code provided by HackerRank

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$scores_temp = rtrim(fgets(STDIN));

$scores = array_map('intval', preg_split('/ /', $scores_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = breakingRecords($scores);

fwrite($fptr, implode(" ", $result) . "\n");

fclose($fptr);
*/

$s = [10, 5, 20, 20, 4, 5, 2, 25, 1];
var_dump(breakingRecords($s)); // [2, 4]

$t = [3, 4, 21, 36, 10, 28, 35, 5, 24, 42];
var_dump(breakingRecords($t)); // [4, 0]

