/**
 * Visit https://leetcode.com/problems/find-the-index-of-the-first-occurrence-in-a-string/description/
 * for full problem description
 * 
 * Given two strings needle and haystack, 
 * return the index of the first occurrence of needle in haystack, 
 * or -1 if needle is not part of haystack.
 * 
 * @param {string} haystack
 * @param {string} needle
 * @return {number}
 */
var strStr = function (haystack, needle) {
    // The JavaScript in-built string search method indexOf
    // returns the index of the first occurrence of needle in haystack,
    // or -1 if needle is not part of haystack, and is all that is needed
    // to write the algorithm that solves this problem.
    return haystack.indexOf(needle);
};