/*
 * Base case #1
 *
 * In this challenge, you'll make it so the isPalindrome() function returns true if the provided string is a palindrome, and false otherwise.
 * Start by implementing the first base case:
 *  if the length of the string is 0 or 1, isPalindrome() should return true.
 * 
 * 
 * Base case #2
 * There is a second base case.
 * If the first and last characters of the string are different, 
 * then we know immediately that the string is not a palindrome. 
 * Write this case, using the provided functions firstCharacter and lastCharacter 
 * to extract the needed characters from the string.
 * 
 * 
 * Recursive case
 * Finally, write the recursive case.
 * Use the provided function middleCharacters to remove the first and last characters from the string.
 */

// Returns the first character of the string str
var firstCharacter = function (str) {
    return str.slice(0, 1);
};

// Returns the last character of a string str
var lastCharacter = function (str) {
    return str.slice(-1);
};

// Returns the string that results from removing the first
//  and last characters from str
var middleCharacters = function (str) {
    return str.slice(1, -1);
};

var isPalindrome = function (str) {
    // base case #1
    if (str.length <= 1) {
        return true;
    }

    // base case #2
    if (firstCharacter(str) !== lastCharacter(str)) {
        return false;
    }

    // recursive case
    return isPalindrome(middleCharacters(str));
};

var checkPalindrome = function (str) {
    console.log("Is this word a palindrome? " + str);
    console.log(isPalindrome(str));
};

checkPalindrome("a");       // true
checkPalindrome("motor");   // false
checkPalindrome("rotor");   // true
checkPalindrome(" ");       // true
checkPalindrome("123321");  // true