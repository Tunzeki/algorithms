/**
 * Visit https://leetcode.com/problems/isomorphic-strings/description/
 * for full problem description
 * 
 * Given two strings s and t, determine if they are isomorphic.
 * Two strings s and t are isomorphic if the characters in s can be replaced to get t.
 * All occurrences of a character must be replaced with another character 
 * while preserving the order of characters. No two characters may map to the same character, 
 * but a character may map to itself.
 * @param {string} s
 * @param {string} t
 * @return {boolean}
 */
var isIsomorphic = function (s, t) {
    const sLength = s.length;
    const tLength = t.length;

    // s and t can't be isomorphic if they have different lengths
    if (sLength !== tLength) {
        return false;
    }

    // The idea here is to create an object where each property is a
    // character of s at a particular position and the value of that property
    // is the character in t at that same position
    // The string values tracks the values of the properties in the object
    const isomorphic = {};
    let values = '';

    for (let i = 0; i < sLength; i++) {
        // If a property doesn't exist in the object,
        // just before you create it and set t[i] as its value,
        // confirm that t[i] doesn't exist as a value of previously defined properties.
        // If it does, return false as "No two characters may map to the same character",
        // i.e, no two properties may map to the same value.
        if (isomorphic[s[i]] === undefined) {
            if (values.indexOf(t[i]) !== -1) {
                return false;
            }
            isomorphic[s[i]] = t[i];
            values = values + t[i];
        } else if (isomorphic[s[i]] !== t[i]) {
            // If a property already exist, you can't map it to another value,
            // hence return false
            return false;
        }
    }

    return true;

};