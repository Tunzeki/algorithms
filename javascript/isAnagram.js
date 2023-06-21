/**
 * Visit https://leetcode.com/problems/valid-anagram/description/
 * for full problem description
 * 
 * Given two strings s and t, return true if t is an anagram of s, and false otherwise.
 * An Anagram is a word or phrase formed by rearranging the letters of a different word or phrase, 
 * typically using all the original letters exactly once.
 * 
 * @param {string} s
 * @param {string} t
 * @return {boolean}
 */
var isAnagram = function (s, t) {
    // t cannot be an anagram of s if they don't have exactly the same number of letters
    if (s.length !== t.length) {
        return false;
    }

    // The idea here is to:
    // 1. Convert both strings into arrays
    // 2. Sort the arrays. This would make the elements at each position in both arrays the same
    // if t is an anagram of s
    // 3. Compare the elements at a particular position, if they are different return false.
    // If the for loop completes execution without returning false, return true
    const sArray = s.split('');
    const tArray = t.split('');

    sArray.sort();
    tArray.sort();

    const sLength = sArray.length;

    for (let i = 0; i < sLength; i++) {
        if (sArray[i] !== tArray[i]) {
            return false;
        }
    }

    return true;

    // My first implementation of the algorithm. Works but not as efficient
    // const sLength = s.length;
    // const tLength = t.length;
    // let tCopy = t.slice();

    // if (sLength !== tLength) {
    //     return false;
    // }

    // for (let i = 0; i < sLength; i++) {
    //     const index = tCopy.indexOf(s[i]);
    //     if (index === -1) {
    //         return false;
    //     }
    //     tCopy = tCopy.slice(0, index) + tCopy.slice(index+1, tCopy.length);
    // }

    // return true;
};