/**
 * https://leetcode.com/problems/valid-parentheses/description/
 * 
 * Given a string s containing just the characters '(', ')', '{', '}', '[' and ']', 
 * determine if the input string is valid.
 * 
 * An input string is valid if:
 * Open brackets must be closed by the same type of brackets.
 * Open brackets must be closed in the correct order.
 * Every close bracket has a corresponding open bracket of the same type.
 * 
 * @param {string} s
 * @return {boolean}
 */

// Create a function to remove adjacent brackets
function removeAdjacentBrackets(oldString, index) {
    const before = oldString.slice(0, index);
    const after = oldString.slice(index + 2)
    const newString = before + after;
    return newString;
}

var isValid = function (s) {
    let sCopy = s;
    // If the length of the string isn't an even number, it is invalid.
    // Return false
    if (sCopy.length % 2 !== 0) {
        return false;
    }

    // If the first character of the string is a closing bracket of any type,
    // return false
    if (sCopy[0] === ')' || sCopy[0] === '}' || sCopy[0] === ']') {
        return false;
    }

    // For any valid string, there will always be that part of it
    // that has adjacent brackets of the same type.
    // Locate this part using the for loop and remove the adjacent brackets
    // If the string is empty at this point, you've successfully removed
    // all the brackets and this means it's a valid string,
    // return true
    // Else: 
    // You want to go to the next iteration of the for loop
    // But first, adjust the value of i
    // You either want i to be the index of the character before 
    // opening bracket you just removed or you want i to be 0
    // Set i = i - 2 for the former and i = -1 for the latter
    // (i++ in the for loop will run after this and update i to the desired value)
    for (let i = 0; i < sCopy.length; i++) {
        if ((sCopy[i] === '(' && sCopy[i + 1] === ')') ||
            (sCopy[i] === '{' && sCopy[i + 1] === '}') ||
            (sCopy[i] === '[' && sCopy[i + 1] === ']')) {
            sCopy = removeAdjacentBrackets(sCopy, i);
            if (sCopy.length === 0) {
                return true;
            } else {
                if (i - 1 >= 0) {
                    i = i - 2;
                } else {
                    i = -1;
                }
            }
        }
    }

    // Return false if the for loop finish executing 
    // without returning true
    return false;

};