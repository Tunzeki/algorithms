/**
 * Visit https://leetcode.com/problems/palindrome-number/description/
 * for problem description
 * 
 * Given an integer x, return true if x is a palindrome, and false otherwise.
 * 
 * An integer is a palindrome when it reads the same forward and backward.
 * For example, 121 is a palindrome while 123 is not.
 * 
 * @param {number} x
 * @return {boolean}
 */
var isPalindrome = function (x) {
    // Convert x to string so you can loop through it later
    // toString() method returns a stringed copy of the number, 
    // so it isn't a mutative operation
    const stringX = x.toString();

    // Keep the result of finding the length of the stringX in a variable.
    // This avoids the overhead of calling the length property
    // in each iteration of the for loop below
    const length = stringX.length;

    // The purpose of the variable, k, will be explained shortly
    let k = 1;

    // Consider this example where stringX is '768867'
    // The length of stringX is therefore 6
    // For stringX to be a palindrome,
    //
    // stringX[firstChar, ie, index 0] (7) === 
    // stringX[lastChar, ie, index(length - 1) -> 5] (7)
    //
    // stringX[nextCharFromTheStart, ie, index 1] (6) === 
    // stringX[nextCharFromTheEnd, ie, index(length - 2) -> 4] (6)
    
    // stringX[nextCharFromTheStart, ie, index 2] (8) === 
    // stringX[nextCharFromTheEnd, ie, index(length - 3) -> 3] (8)
    
    // Notice how we keep subtracting a successively increasing number
    // which started from 1 from the length of stringX
    // This is the variable k
    
    // How many iteration of the loop did we have?
    // 3, right? That's (length / 2) in the conditional of the for loop
    // By the time you get to the middle character (the last character in the first half of stringX), 
    // you would have compared all characters in the first half to those in the other half
    
    // If the two characters in stringX that are being compared aren't equal,
    // return false
    
    // Return true if you end the for loop without returning false
    
    for (let i = 0; i < (length / 2); i++) {
        if (stringX[i] !== stringX[length - k]) {
            return false;
        }
        k++;
    }

    return true;

};