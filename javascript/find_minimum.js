var findMinimum = function (array, startIndex) {
    /* Set initial values for minValue and minIndex,
     * based on the leftmost entry in the subarray:  
     */  
    var minValue = array[startIndex];
    var minIndex = startIndex;

    /*
     * This function returns minValue and minIndex.
     * Therefore, it is important to set the initial values for minValue and minIndex as done above 
     * so as to prevent an error (undefined variables) 
     * in case the condition of the if statement in the for loop is not met.
     * and minValue and minIndex are not updated
     *
     * 
     * Loop over items starting with index immediately after startIndex, 
     * updating minValue and minIndex as needed:
     */
    
    for (var currentIndex = minIndex + 1; currentIndex <= array.length - 1; currentIndex++) {
        if (array[currentIndex] < minValue) {
            minValue = array[currentIndex];
            minIndex = currentIndex;

        }

    }

    return "Minimum value is " + minValue + " and its index is " + minIndex;
};

var array = [18, 6, 66, 44, 9, 22, 14];
//var index = indexOfMinimum(array, 2);
console.log(findMinimum(array, 2));