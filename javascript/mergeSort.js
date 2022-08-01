// Takes in an array that has two sorted subarrays,
//  from [p..q] and [q+1..r], and merges the array
var merge = function (array, p, q, r) {
    // This code has been purposefully obfuscated,
    //  as you'll write it yourself in next challenge.
    var a = [], b = [], c = p, d, e; for (d = 0; c <= q; d++, c++) { a[d] = array[c]; } for (e = 0; c <= r; e++, c++) { b[e] = array[c]; } c = p; for (e = d = 0; d < a.length && e < b.length;) { if (a[d] < b[e]) { array[c] = a[d]; d++; } else { array[c] = b[e]; e++; } c++; } for (; d < a.length;) { array[c] = a[d]; d++; c++; } for (; e < b.length;) { array[c] = b[e]; e++; c++; }
};

/*
 * The mergeSort function recursively sorts the subarray array[p..r] 
 * i.e. after calling mergeSort(array, p, r) 
 * the elements from index p to index r of array will be sorted in ascending order
 * To remind you of the merge sort algorithm:
 * -If the subarray has size 0 or 1, then it's already sorted, and so nothing needs to be done
 * - Otherwise, merge sort uses divide - and - conquer to sort the subarray.
 * Use merge(array, p, q, r) to merge sorted sub arrays array[p..q] and array[q + 1..r].
*/

// Takes in an array and recursively merge sorts it
var mergeSort = function (array, p, r) {
    if (p < r) {
        // add p and r, divide by 2, and round down; this gives you q
        var q = Math.floor((p + r) / 2);
        mergeSort(array, p, q);
        mergeSort(array, q + 1, r);
        merge(array, p, q, r);
    }

};

var array = [14, 7, 3, 12, 9, 11, 6, 2];
mergeSort(array, 0, array.length - 1);
console.log("Array after sorting: " + array); // outputs 2,3,6,7,9,11,12,14

var another_array = [14, -7, 3, 0, 9, 4, 5, 2];
mergeSort(another_array, 0, another_array.length - 1);
console.log("Array after sorting: " + another_array); // outputs -7,0,2,3,4,5,9,14
