/**
 * Visit https://leetcode.com/problems/remove-element/description/
 * for full problem description
 * 
 * Given an integer array nums and an integer val, 
 * remove all occurrences of val in nums in-place. 
 * The order of the elements may be changed. 
 * Then return the number of elements in nums which are not equal to val.
 * 
 * Consider the number of elements in nums which are not equal to val be k, 
 * to get accepted, you need to do the following things:
 * - Change the array nums such that the first k elements of nums 
 *      contain the elements which are not equal to val. 
 *      The remaining elements of nums are not important as well as the size of nums.
 * - Return k
 * 
 * @param {number[]} nums
 * @param {number} val
 * @return {number}
 */
var removeElement = function (nums, val) {
    const length = nums.length;

    // Loop through the array.
    // When you find an element equals to val,
    // remove it from the array
    for (let i = 0; i < length; i++) {
        if (nums[i] === val) {
            nums.splice(i, 1);
            i--;
        }
    }

    // nums now contains elements other than val,
    // return its new length
    return nums.length;

};