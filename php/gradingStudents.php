<?php
/*
 * HackerLand University has the following grading policy:
 * Every student receives a grade in the inclusive range from 0 to 100.
 * Any grade less than 40 is a failing grade.
 * 
 * Sam is a professor at the university and likes to round each student's grade according to these rules:
 * If the difference between the grade and the next multiple of 5 is less than 3, round grade up to the next multiple of 5.
 * If the value of grade is less than 38, no rounding occurs as the result will still be a failing grade.
 * 
 * Complete the 'gradingStudents' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts INTEGER_ARRAY grades as parameter.
 */
 
// I wrote nextMultipleOf5 to find the next multiple of 5 of any given number
function nextMultipleOf5 ($number) {
    $i = $number % 5;

    switch ($i) {
    case 0:
        return $number + 5;
    case 1:
        return $number + 4;
    case 2:
        return $number + 3;
    case 3:
        return $number + 2;
    case 4:
        return $number + 1;     
    }
}

function gradingStudents($grades) {
    // Write your code here
    for ($i = 0; $i < count($grades); $i++) {
        if ($grades[$i] < 38) {
            continue;
        } else {
          if ((nextMultipleOf5($grades[$i]) - $grades[$i]) < 3) {
            $grades[$i] = nextMultipleOf5($grades[$i]);
          } 
        }    
    }
    return $grades;

}

/*
HackerRank Code commmented out

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$grades_count = intval(trim(fgets(STDIN)));

$grades = array();

for ($i = 0; $i < $grades_count; $i++) {
    $grades_item = intval(trim(fgets(STDIN)));
    $grades[] = $grades_item;
}

$result = gradingStudents($grades);

fwrite($fptr, implode("\n", $result) . "\n");

fclose($fptr);

*/

//echo nextMultipleOf5(57);
var_dump(gradingStudents([84, 29, 57]));        // [85, 29, 57]
var_dump(gradingStudents([73, 67, 38, 33,]));   // [75, 67, 40, 33]
?>