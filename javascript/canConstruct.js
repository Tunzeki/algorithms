/**
 * Visit https://leetcode.com/problems/ransom-note/description/
 * for problem description
 * 
 * Given two strings ransomNote and magazine, 
 * return true if ransomNote can be constructed by using the letters from magazine and false otherwise.
 * Each letter in magazine can only be used once in ransomNote.
 * 
 * @param {string} ransomNote
 * @param {string} magazine
 * @return {boolean}
 */
var canConstruct = function (ransomNote, magazine) {
    // In order to keep canConstruct a pure function,
    // I created a copy of magazine because I will be mutating this copy later
    let haystack = magazine;

    // Loop through each letter in ransomNote,
    // If the letter is present in haystack (a copy of magazine),
    // delete the letter from haystack
    // Go to the next iteration of the for loop
    // Else:
    // return false

    for (let i = 0; i < ransomNote.length; i++) {

        let index = haystack.search(ransomNote[i]);

        if (index !== -1) {
            let charToBeRemoved = haystack.charAt(index);
            haystack = haystack.replace(charToBeRemoved, "");
        } else {
            return false;
        }
    }

    return true;

};