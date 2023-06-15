/**
 * Visit https://leetcode.com/problems/length-of-last-word/description/
 * for full problem description
 * 
 * Given a string s consisting of words and spaces, 
 * return the length of the last word in the string.
 * A word is a maximal substring consisting of non-space characters only.
 * 
 * @param {string} s
 * @return {number}
 */
var lengthOfLastWord = function (s) {
    // Remove white spaces at both ends of the string
    // This ensures that the string ends with a word
    const sTrimmed = s.trim();
    // Put substrings separated by one whitespace ' ' into an array
    const sArray = sTrimmed.split(' ');
    // Return the length of the last element in the array
    return sArray[sArray.length - 1].length;

};