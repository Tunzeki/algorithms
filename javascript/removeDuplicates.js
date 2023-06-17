/**
 * Visit https://leetcode.com/problems/remove-duplicates-from-sorted-array/description/
 * for problem description
 * 
 * Given an integer array nums sorted in non-decreasing order, 
 * remove the duplicates in-place such that each unique element appears only once. 
 * The relative order of the elements should be kept the same. 
 * Then return the number of unique elements in nums.
 * Consider the number of unique elements of nums to be k, to get accepted, 
 * you need to do the following things:
 * - `Change the array nums such that the first k elements of nums 
 *      contain the unique elements in the order they were present in nums initially. 
 *      The remaining elements of nums are not important as well as the size of nums.
 * - Return k.
 * 
 * @param {number[]} nums
 * @return {number}
 */
var removeDuplicates = function (nums) {
    // const length = nums.length;
    // let firstRemovedElement;
    // let nextRemovedElement;

    // k is the number of unique elements. 
    // Since it is guaranteed that the length of the nums array
    // is at least 1 (see algorithm constraints), initialize k = 1
    let k = 1;

    // Loop through the nums array and compare each element with the next one.
    // If they are equal: 
    // - remove the next element(a duplicate) from the array.
    // - in the next iteration, you still want to compare the current element 
    //    with the new next element (the new next element is the element at position i+2
    //    before the splice operation), thus decrement i by 1 (i--).
    // Else, increment k by 1
    for (let i = 0; i < nums.length - 1; i++) {
        if (nums[i] === nums[i + 1]) {
            nums.splice(i + 1, 1);
            i--;
        } else {
            k++;
        }
    }

    return k;

    // A more verbose solution which sequentially moves duplicates 
    // to the end of the nums array
    // for (let i = 0; i < length; i++) {
    //     if (nums[i] === nums[i+1]) {
    //         if (typeof firstRemovedElement === 'undefined') {
    //             firstRemovedElement = nums.splice(i+1, 1);
    //             nums.push(firstRemovedElement);
    //         } else {
    //             nextRemovedElement = nums.splice(i+1, 1);
    //             nums.push(nextRemovedElement);
    //         }
    //         i--;
    //     } else if (nums[i] !== nums[i+1] && nums[i+1] !== firstRemovedElement) {
    //         k++;
    //     }
    //     if (nums[i+1] === firstRemovedElement) {
    //         break;
    //     }
    // }

    // return k;

};