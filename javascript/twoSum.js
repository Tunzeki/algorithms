/**
 * Visit https://leetcode.com/problems/two-sum/description/
 * for problem description
 * 
 * Given an array of integers nums and an integer target, 
 * return indices of the two numbers such that they add up to target.
 * You may assume that each input would have exactly one solution, 
 * and you may not use the same element twice.
 * You can return the answer in any order.
 * 
 * @param {number[]} nums
 * @param {number} target
 * @return {number[]}
 */
var twoSum = function (nums, target) {
    // It's faster to call an array method once and put its return value into a constant
    // than to keep calling the array method in every iteration of your loop
    const length = nums.length;

    // For each element in the nums array,
    // check if its addition to any one of the subsequent elements equals target
    // return the indices of the two elements whose sum equals target.
    // It is guaranteed that there will always be two such elements
    for (let i = 0; i < (length - 1); i++) {
        for (let j = i + 1; j < length; j++) {
            if (nums[i] + nums[j] === target) {
                return [i, j];
            }
        }
    }
};