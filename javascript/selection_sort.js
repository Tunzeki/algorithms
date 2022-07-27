/*
The following comments show how Khan Academy implemented
the swap and indexOfMinimum functions.
Quite similar to how I implemented mine, right?!

PS: I saw their implementation AFTER I did mine.

var swap = function (array, firstIndex, secondIndex) {
    var temp = array[firstIndex];
    array[firstIndex] = array[secondIndex];
    array[secondIndex] = temp;
};

var indexOfMinimum = function (array, startIndex) {

    var minValue = array[startIndex];
    var minIndex = startIndex;

    for (var i = minIndex + 1; i < array.length; i++) {
        if (array[i] < minValue) {
            minIndex = i;
            minValue = array[i];
        }
    }
    return minIndex;
};
*/
var swap = function (array, firstIndex, secondIndex) {
    // temp is a temporary variable to store the value of one
    // of the items before swapping them
    var temp = array[firstIndex];
    array[firstIndex] = array[secondIndex];
    array[secondIndex] = temp;

    // return array;
};

// indexOfMinimum function is a slight modification of findMinimum function 
// that was defined in the find_minimum.js file.

var indexOfMinimum = function (array, startIndex) {
    /* Set initial values for minValue and minIndex,
     * based on the leftmost entry in the subarray:  
     */
    var minValue = array[startIndex];
    var minIndex = startIndex;

    /*
     * This function returns minIndex.
     * Therefore, it is important to set the initial value for minIndex as done above 
     * so as to prevent an error (undefined variable) 
     * in case the condition of the if statement in the for loop is not met.
     * and minIndex is not updated
     *
     * 
     * Loop over items starting with index immediately after startIndex, 
     * updating minValue (thus important to set an initial value) and minIndex as needed:
     */

    for (var currentIndex = minIndex + 1; currentIndex <= array.length - 1; currentIndex++) {
        if (array[currentIndex] < minValue) {
            minValue = array[currentIndex];
            minIndex = currentIndex;
        }
    }

    return minIndex;
};

/*
 * Selection sort loops over positions in the array. 
 * For each position, it finds the index of the minimum value in the subarray starting at that position. 
 * Then it swaps the values at the position and at the minimum index.
 * 
 */

var selectionSort = function (array) {
    var forSwapping;
    for (var item = 0; item < array.length; item++) {
        forSwapping = indexOfMinimum(array, item);
        swap(array, forSwapping, item);
    }

    return array;
};

var array = [22, 11, 99, 88, 9, 7, 42];
console.log(selectionSort(array));
// should return [7, 9, 11, 22, 42, 88, 99]

var array2 = [12, -5, 99, 0, 19, 27, 8];
console.log(selectionSort(array2));
// should return [-5, 0, 8, 12, 19, 27, 99]