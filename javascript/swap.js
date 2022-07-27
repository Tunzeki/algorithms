// This function swaps the location of two items in an array 

var swap = function (array, firstIndex, secondIndex) {
    // temp is a temporary variable to store the value of one
    // of the items before swapping them
    var temp = array[firstIndex];
    array[firstIndex] = array[secondIndex];
    array[secondIndex] = temp;

    return array;
};

var testArray = [7, 9, 4];
console.log(swap(testArray, 0, 1));