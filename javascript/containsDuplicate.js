/**
 * Visit https://leetcode.com/problems/contains-duplicate/description/
 * for problem description
 * 
 * Given an integer array nums, 
 * return true if any value appears at least twice in the array, 
 * and return false if every element is distinct.
 * 
 * @param {number[]} nums
 * @return {boolean}
 */
var containsDuplicate = function (nums) {
    // Since sort() mutates the original array,
    // call sort() on a copy of nums so as to keep
    // containsDuplicate a pure function.
    // Also keep the result of calling the length property on newNums
    // in a separate variable.
    // This avoids the overhead of calling this property in every
    // iteration of the for loop below
    const newNums = nums;
    newNums.sort();
    length = newNums.length;

    // Since newNums has been sorted,
    // Compare each value in the array with the next one
    // If they are equal, it means the array contains 
    // duplicate. Return true
    for (let i  = 0; i < length; i++) {
        if (newNums[i] === newNums[i+1]) {
            return true;
        }
    }

    // Return false here since evaluating the for loop
    // did not cause true to be returned.
    return false;
    
};