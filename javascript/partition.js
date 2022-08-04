/*
 * The partition function partitions the subarray array[p..r] 
 * so that all elements in array[p..q-1] are less than or equal to array[q] (the pivot) 
 * and all elements in array[q+1..r] are greater than array[q], 
 * and it returns the index q of where the pivot ends up.
 * 
 * Use the provided swap() function for swapping
 * 
 * NOTE: 
 * The goal of the partition function is to divide an array 
 * by the rightmost number in the original array (i.e the pivot)
 * such that numbers smaller than the pivot are to the left of the pivot
 * and numbers greater than the pivot are to its right
 * The goal of the partition function is NOT to sort the array.
 */
// Swaps two items in an array, changing the original array
var swap = function (array, firstIndex, secondIndex) {
    var temp = array[firstIndex];
    array[firstIndex] = array[secondIndex];
    array[secondIndex] = temp;
};

var partition = function (array, p, r) {
    // Compare array[j] with array[r], for j = p, p+1,...r-1
    // maintaining that:
    //  array[p..q-1] are values known to be <= to array[r]
    //  array[q..j-1] are values known to be > array[r]
    //  array[j..r-1] haven't been compared with array[r]
    // If array[j] > array[r], just increment j.
    // If array[j] <= array[r], swap array[j] with array[q],
    //   increment q, and increment j. 
    // Once all elements in array[p..r-1]
    //  have been compared with array[r],
    //  swap array[r] with array[q], and return q.
    
    /* 
     * The comments in the first few lines of this function are those provided in the original challenge on Khan Academy
     * Personally, I don't understand them much.
     * However, reading through the pseudocode provided before the challenge
     * @ https://www.khanacademy.org/computing/computer-science/algorithms/quick-sort/a/linear-time-partitioning
     * helped me a great deal 
     */ 
    var j, q = p;
    for (j = p; j < r; j++) {
        if (array[j] <= array[r]) {
            swap(array, q, j);
            q++;
        }
    }
    swap(array, q, r);
    return q;
};

var array = [9, 7, 5, 11, 12, 2, 14, 3, 10, 4, 6];
var q = partition(array, 0, array.length - 1);
console.log("Array after partitioning: " + array); // 5,2,3,4,6,7,14,9,10,11,12
console.log(q); // 4 (the index of the pivot after partitioning, which is the number 6)

var array = [9, -7, 5, 0, 12, 2, 14, 3, 10, 4, 8];
var s = partition(array, 0, array.length - 1);
console.log("Array after partitioning: " + array);
console.log(s); // 6 (the index of the pivot after partitioning, which is 8)
