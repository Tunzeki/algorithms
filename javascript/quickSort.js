// This function partitions given array and returns 
//  the index of the pivot.
var partition = function (array, p, r) {
    // This code has been purposefully obfuscated,
    // as you will implement it yourself in next challenge
    var e = array, t = p, n = r; var r = function (e, t, n) { var r = e[t]; e[t] = e[n]; e[n] = r; }; var i = t; for (var s = t; s < n; s++) { if (e[s] <= e[n]) { r(e, s, i); i++; } } r(e, n, i); return i;
};

/*
 * The quickSort function should recursively sort the subarray array[p..r].
 *  - If the subarray has size 0 or 1, then it's already sorted, and so nothing needs to be done.
 *  - Otherwise, quickSort uses divide - and - conquer to sort the subarray.
 * 
 * The divide step should partition the array, 
 * the conquer step should recursively quicksort the partitioned subarrays, 
 * and the combine step should do nothing.
 */
var quickSort = function (array, p, r) {
    if (p < r) {
        var divide = partition(array, p, r);
        quickSort(array, p, divide - 1);
        quickSort(array, divide + 1, r);
    }

};

var array = [9, 7, 5, 11, 12, 2, 14, 3, 10, 6];
quickSort(array, 0, array.length - 1);
console.log("Array after sorting: " + array); // 2,3,5,6,7,9,10,11,12,14

var another_array = [9, 7, -5, 11, 0, 2, 1, 3, 10, 1];
quickSort(another_array, 0, another_array.length - 1);
console.log("Array after sorting: " + another_array); // -5,0,1,1,2,3,7,9,10,11

