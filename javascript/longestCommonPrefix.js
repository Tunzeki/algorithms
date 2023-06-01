/**
 * Visit https://leetcode.com/problems/longest-common-prefix/description/
 * for problem description
 * 
 * Write a function to find the longest common prefix string amongst an array of strings.
 * If there is no common prefix, return an empty string "".
 * 
 * @param {string[]} strs
 * @return {string}
 */
var longestCommonPrefix = function (strs) {
    // Make a copy of strs in order to keep longestCommonPrefix a pure function
    // This copy is to be sorted
    // Also, keep the results of calling the length method on copy 
    // and the first string in copy in different variables
    // This avoids the overhead of calling a method in every iteration
    // of the for loop and in the if statement below
    const copy = strs;
    const length = copy.length;
    copy.sort();
    const firstStringLength = copy[0].length;

    // Since copy has been sorted in alphabetical order,
    // the longest common prefix is the common letters 
    // shared by the first and last string in copy.
    // Iterate through all the letters in the first string in copy
    // Return the letters in copy[0] up to (but not including)
    // the index where the letter in copy[0][index] isn't the same
    // as copy[last][index]
    for (let i = 0; i < firstStringLength; i++) {
        if (copy[0][i] !== copy[length - 1][i]) {
            return copy[0].slice(0, i);
        }
    }

    // If you've gone through the for loop
    // and didn't call the return statement,
    // it means all the letters in the first string of copy
    // can be found in the last string of copy
    // return the first string of copy
    return copy[0];



    // This was my first solution. 
    // It works but is not as efficient as the above
    // let commonPrefix = "";
    // const length = strs.length;
    // const firstStringLength = strs[0].length;

    // if (length === 1) {
    //     return strs[0];
    // }

    // for (let i = 0; i < firstStringLength; i++) {
    //     for (let j = 0; j < (length - 1); j++) {
    //         if (strs[j][i] !== strs[j+1][i]) {
    //             return commonPrefix;
    //         } 
    //         if (j === (length - 2)) {
    //             commonPrefix = commonPrefix + strs[j][i];
    //         }
    //     }
    // }

    // return commonPrefix;

};