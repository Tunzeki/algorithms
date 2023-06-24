/**
 * Visit https://leetcode.com/problems/single-number/description/
 * for full problem description
 * 
 * Given a non-empty array of integers nums, 
 * every element appears twice except for one. 
 * Find that single one.
 * You must implement a solution with a linear runtime complexity 
 * and use only constant extra space.
 * 
 * @param {number[]} nums
 * @return {number}
 */
var singleNumber = function (nums) {
    const length = nums.length;

    // If nums has just one element, return this element
    if (length === 1) {
        return nums[0];
    }

    numsCopy = nums.slice(); // keep singleNumber(nums) pure
    // Naturally, the sort method of arrays works best
    // for an array of strings
    // To sort an array of numbers correctly,
    // provide sort() with a callback function
    numsCopy.sort(function (a, b) { return a - b });

    // Compare two elements in the sorted array at once,
    // starting from the first two,
    // If they are not the same, return the first of these two elements
    // If they are, go i+1 and then repeat the step.
    // If you reach the last element in nums, 
    // it means you haven't found a unique element so far.
    // This has to be it.
    for (let i = 0; i < length; i++) {
        if (i === length - 1) {
            return numsCopy[i];
        }
        if (numsCopy[i] !== numsCopy[i + 1]) {
            return numsCopy[i];
        }
        i++;
    }

};