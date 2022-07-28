// Insertion sort loops over items in the array, inserting each new item into the subarray before the new item.
// It makes use of the insert function originally written in insert.js file and copied here.

var insert = function (array, rightIndex, value) {
    var presentIndex;
    for (presentIndex = rightIndex; presentIndex >= 0 && array[presentIndex] > value; presentIndex--) {
        array[presentIndex + 1] = array[presentIndex];
    }
    array[presentIndex + 1] = value;
};

var insertionSort = function (array) {
    for (var i = 1; i < array.length; i++) {
        insert(array, i - 1, array[i]);
    }
};

var array = [22, 11, 99, 88, 9, 7, 42];
insertionSort(array);
console.log(array);
// Outputs [7, 9, 11, 22, 42, 88, 99]

var another_array = [5, 19, -8, 7, 0, 6, 7];
insertionSort(another_array);
console.log(another_array);
// Outputs [-8, 0, 5, 6, 7, 7, 19]