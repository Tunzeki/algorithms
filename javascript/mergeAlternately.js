/**
 * Visit https://leetcode.com/problems/merge-strings-alternately/description/
 * for problem description
 * 
 * You are given two strings word1 and word2. 
 * Merge the strings by adding letters in alternating order, starting with word1. 
 * If a string is longer than the other, append the additional letters onto the end of the merged string.
 * Return the merged string.
 * 
 * @param {string} word1
 * @param {string} word2
 * @return {string}
 */
var mergeAlternately = function (word1, word2) {
    // Initialize the return variable to an empty string
    let merged = '';

    // To avoid calling the length property in each iteration of the for loop below,
    // call it once for both strings and keep its values in variables
    const word1Length = word1.length;
    const word2Length = word2.length;

    // Remember that variables defined with the let keyword have block scope
    // Therefore, define i outside of the for loop so you can use it outside
    // the loop (in the slice method)
    let i;

    // Since you want to add the letters of the two strings in alternate order,
    // it makes sense that the number of times you'll run the for loop
    // will be equal to the length of the shorter string 
    // (or when they have equal lengths)
    // Otherwise, you risk calling undefined indices of the shorter string.
    // After you're done with the for loop, append the remaining letters
    // of the longer string onto the end of the merged string  
    if (word1Length < word2Length) {
        for (i = 0; i < word1Length; i++) {
            merged = merged + word1[i] + word2[i];
        }
        // slice(i, ...) rather than i+1 because i++ in the for loop
        // already increased the value of i by 1 at the termination of the loop
        merged = merged + word2.slice(i, word2Length);

    } else {
        // the else statement is executed in cases where
        // word1Length = word2Length or word1Length > word2Length
        for (i = 0; i < word2Length; i++) {
            merged = merged + word1[i] + word2[i];
        } 
        // slice() won't append any letters
        // onto the end of the merged string in cases where
        // word1Length = word2Length
        merged = merged + word1.slice(i, word1Length);
    }

    return merged;

};