/**
 * Visit https://leetcode.com/problems/is-subsequence/description/
 * for full problem description
 * 
 * Given two strings s and t, return true if s is a subsequence of t, or false otherwise.
 * A subsequence of a string is a new string that is formed from the original string 
 * by deleting some (can be none) of the characters without disturbing the relative positions 
 * of the remaining characters. (i.e., "ace" is a subsequence of "abcde" while "aec" is not).
 * 
 * @param {string} s
 * @param {string} t
 * @return {boolean}
 */
var isSubsequence = function (s, t) {
    const sLength = s.length;
    const tLength = t.length;

    // s can't be a subsequence of t if it has more letters than t.
    if (sLength > tLength) {
        return false;
    }

    // s and t have to be the same string if they have equal lengths,
    // otherwise, return false.
    if (sLength === tLength && s !== t) {
        return false;
    }

    // If s is a one-character string and this character isn't found in t,
    // return false.
    if (sLength === 1 && t.indexOf(s) === -1) {
        return false;
    }

    // This for loop compares the relative position of two adjacent characters
    // of the string s in the string t.
    // If the position of the second character is less than or equal to that
    // of the first, s isn't a subsequence of t. Return false.
    // It is crucially important to update t to the remaining characters of t
    // after the first character for any two characters of s in t being compared.
    // This is because the indexOf method returns the first position of the character
    // being searched for in a string.
    // Not updating t will lead to bugs as you will be searching the original t
    // for the second character instead of the remaining characters of t
    // after the first character for any two characters of s in t being compared.
    let tCopy = t; // so that isSubsequence(s, t) can remain pure
    for (let i = 0; i < sLength - 1; i++) {
        let first = tCopy.indexOf(s[i]);
        tCopy = tCopy.slice(first + 1); // Not including this line cost me 40 more minutes
        let second = tCopy.indexOf(s[i + 1]) + first + 1;
        if (second <= first) {
            return false;
        }
    }

    return true;

};