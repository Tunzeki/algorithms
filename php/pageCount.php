<?php

/*
 * A teacher asks the class to open their books to a page number. 
 * A student can either start turning pages from the front of the book or from the back of the book. 
 * They always turn pages one at a time. When they open the book, page 1 is always on the right side:
 * 
 * When they flip page 1, they see pages 2 and 3. Each page except the last page will always be printed on both sides. 
 * The last page may only be printed on the front, given the length of the book. 
 * If the book is n pages long, and a student wants to turn to page p, what is the minimum number of pages to turn? 
 * They can start at the beginning or the end of the book.
 * 
 * Given n and p, find and print the minimum number of pages that must be turned in order to arrive at page p.
 * Complete the 'pageCount' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER n
 *  2. INTEGER p
 */

function pageCount($n, $p)
{
    // Write your code here
    // x and y are the number of pages turned from the front page and last page respectively 
    // From the front page
    $x = round(($p - 1) / 2);
    // From the back page
    if ($n == $p) {
        // If n = p, it means you're to open to the last page and then you won't have to turn the pages at all
        // opening the book at start time to page 1 or the last page is not considered as turning the pages
        $y = 0;
        return $y;
    } else if ($n % 2 == 0) {
        // For when the total number of pages, n, is even
        $y = round(($n - $p) / 2);
    } else {
        // For when the total number of pages, n, is odd
        $y = round(($n - 1 - $p) / 2);
    }
    if ($x <= $y) {
        return $x;
    } else {
        return $y;
    }
}

/*
$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$p = intval(trim(fgets(STDIN)));

$result = pageCount($n, $p);

fwrite($fptr, $result . "\n");

fclose($fptr);
*/

?>