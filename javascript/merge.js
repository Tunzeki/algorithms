/*
 * The merge function merges the sorted subarrays in array[p..q] and array[q+1..r] into a single sorted subarray in array[p..r]. 
 * The function starts by allocating two temporary arrays, lowHalf and highHalf, 
 * and copying array[p..q] into lowHalf and array[q+1..r] into highHalf.
 * 
 * The function repeatedly compares the lowest untaken element in lowHalf with the lowest untaken element in highHalf 
 * and copies the lower of the two back into array, starting at array[p].
 * Once one of lowHalf and highHalf has been fully copied back into array, 
 * the remaining elements in the other temporary array are copied back into array.
 * 
 * Note: use indexes i,j and k to access elements in lowHalf,highHalf,and array.
 */

// Takes in an array that has two sorted subarrays,
//  from [p..q] and [q+1..r], and merges the array
var merge = function (array, p, q, r) {
    var lowHalf = [];
    var highHalf = [];

    var k = p;
    var i;
    var j;
    for (i = 0; k <= q; i++, k++) {
        lowHalf[i] = array[k];
    }
    for (j = 0; k <= r; j++, k++) {
        highHalf[j] = array[k];
    }

    k = p;
    i = 0;
    j = 0;

    // Repeatedly compare the lowest untaken element in
    //  lowHalf with the lowest untaken element in highHalf
    //  and copy the lower of the two back into array
    while (i < lowHalf.length && j < highHalf.length) {
        if (lowHalf[i] < highHalf[j]) {
            array[k] = lowHalf[i];
            i++;
        } else {
            array[k] = highHalf[j];
            j++;
        }
        k++;
    }


    // Once one of lowHalf and highHalf has been fully copied
    //  back into array, copy the remaining elements from the
    //  other temporary array back into the array
    while (i < lowHalf.length) {
        array[k] = lowHalf[i];
        i++;
        k++;
    }
    while (j < highHalf.length) {
        array[k] = highHalf[j];
        j++;
        k++;
    }

};


var array = [3, 7, 12, 14, 2, 6, 9, 11];
merge(array, 0,
    Math.floor((0 + array.length - 1) / 2),
    array.length - 1);
console.log("Array after merging: " + array); // [2, 3, 6, 7, 9, 11, 12, 14];

var another_array = [-3, 1, 3, 7, 0, 1, 4, 9];
merge(another_array, 0,
    Math.floor((0 + another_array.length - 1) / 2),
    another_array.length - 1);
console.log("Array after merging: " + another_array); // outputs [-3, 0, 1, 1, 3, 4, 7, 9]
