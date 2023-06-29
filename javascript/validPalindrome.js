/**
 * Visit https://leetcode.com/problems/valid-palindrome/description/
 * for full problem description
 * 
 * A phrase is a palindrome if, after converting all uppercase letters into lowercase letters 
 * and removing all non-alphanumeric characters, it reads the same forward and backward. 
 * Alphanumeric characters include letters and numbers.
 * 
 * Given a string s, return true if it is a palindrome, or false otherwise.
 * 
 * @param {string} s
 * @return {boolean}
 */
var isPalindrome = function (s) {
    // Convert all uppercase letters into lowercase letters
    const lowerCasedS = s.toLowerCase();
    const length = lowerCasedS.length;
    // strippedS will contain all alphanumeric lowercased characters of s reading forward
    // while reversedS will contain the same reading backward
    let strippedS = '';
    let reversedS = '';

    // Remove all non-alphanumeric characters
    // To do this: use a regular expression
    // If the character is alphanumeric,
    // update strippedS and reversedS 
    for (let i = 0; i < length; i++) {
        if (lowerCasedS[i].match(/[a-z0-9]/)) {
            strippedS = strippedS + lowerCasedS[i];
            reversedS = lowerCasedS[i] + reversedS;
        }
    }

    // If strippedS and reversedS are equal, return true
    if (strippedS === reversedS) {
        return true;
    }

    return false;

};