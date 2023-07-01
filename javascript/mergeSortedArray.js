/**
 * Visit https://leetcode.com/problems/merge-sorted-array/description/
 * for full problem description
 * 
 * You are given two integer arrays nums1 and nums2, sorted in non-decreasing order, 
 * and two integers m and n, representing the number of elements in nums1 and nums2 respectively.
 * Merge nums1 and nums2 into a single array sorted in non-decreasing order.
 * 
 * The final sorted array should not be returned by the function, 
 * but instead be stored inside the array nums1. To accommodate this, 
 * nums1 has a length of m + n, where the first m elements denote the elements that should be merged, 
 * and the last n elements are set to 0 and should be ignored. nums2 has a length of n.
 * 
 * @param {number[]} nums1
 * @param {number} m
 * @param {number[]} nums2
 * @param {number} n
 * @return {void} Do not return anything, modify nums1 in-place instead.
 */
var merge = function (nums1, m, nums2, n) {
    // If one array is empty (m = 0 or n = 0), update nums1 to be equal to the other array
    if (m === 0) {
        // for some reason, setting nums1 = nums2 doesn't pass the test,
        // this is why I used a for loop to update nums1
        for (let i = 0; i < nums2.length; i++) {
            nums1[i] = nums2[i];
        }
    } else if (n === 0) {
        nums1.splice(m, nums1.length - m);
    } else {
        // Compare the element in the last checked position in nums1
        // with the last checked position in nums2, place in finalSortedArray,
        // a temporary array of what nums1 will be eventually, the lesser of the
        // two elements
        let a = 0;
        let b = 0;
        const finalSortedArray = [];

        nums1.splice(m, nums1.length - m);

        for (let i = 1; i <= (m + n); i++) {
            if (typeof nums1[a] === 'undefined' || nums2[b] < nums1[a]) {
                finalSortedArray.push(nums2[b]);
                b++;
            } else if (typeof nums2[b] === 'undefined' || nums1[a] <= nums2[b]) {
                finalSortedArray.push(nums1[a]);
                a++;
            }
        }

        // for some reason, setting nums1 = finalSortedArray doesn't pass the test,
        // this is why I used a for loop to update nums1
        for (let i = 0; i < finalSortedArray.length; i++) {
            nums1[i] = finalSortedArray[i];
        }
    }

};