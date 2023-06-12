/**
 * Visit https://leetcode.com/problems/majority-element/description/
 * for problem description
 * 
 * Given an array nums of size n, return the majority element.
 * The majority element is the element that appears more than ⌊n / 2⌋ times. 
 * You may assume that the majority element always exists in the array.
 * 
 * @param {number[]} nums
 * @return {number}
 */
var majorityElement = function (nums) {
    // Make a copy of the nums array using the slice method
    // and sort this copy in order to keep majorityElement()
    // a pure function.
    // newNums.length is checked in each iteration of the for loop below
    // To make the algorithm faster, save the result of evaluating
    // newNums.length in a variable
    const newNums = nums.slice();
    newNums.sort();
    const length = newNums.length;

    // Since newNums is a sorted array, any particular element that occurs
    // more than once will follow will have indices that follow each other.
    // Thus, to find the majority element:
    // First, assume that the first element in the newNums array is the 
    // majority element, and set its count to 1
    // Then using the for loop,
    // if the next element is the same as the majority element,
    //     increase the count of the majority element.
    //     Check if the condition of the algorithm that says that
    //     the majority element is the element that appears more than ⌊n / 2⌋ times,
    //     where n is the length of the array
    //     If the condition is met, return the majority element,
    //    else, go to the next iteration of the loop
    // If the current element is not the same as the majority element,
    // the previous element (which was the majority element up till now)
    // cannot be the majority element (because it doesn't appear in the array
    // more than n/2 times),
    // set the current element as the majority element and set count as 1
    // go to the next iteration of the loop
    let majorityEl = newNums[0];
    let count = 1;

    for (i = 1; i < length; i++) {
        if (newNums[i] === majorityEl) {
            count++;
            if (count > length / 2) {
                return majorityEl;
            }
        } else {
            majorityEl = newNums[i];
            count = 1;
        }
    }

    // Returning the majority element here helps to solve the edge case
    // in which the array has a single element and the for loop doesn't execute
    return majorityEl;

};