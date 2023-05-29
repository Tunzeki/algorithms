/**
 * Visit https://leetcode.com/problems/roman-to-integer/description/
 * for problem description
 * 
 * @param {string} s
 * @return {number}
 */
var romanToInt = function (s) {
    const conversion = {
        "I": 1,
        "V": 5,
        "X": 10,
        "L": 50,
        "C": 100,
        "D": 500,
        "M": 1000,
    };

    let sum = 0;


    for (let i = 0; i < s.length; i++) {
        // If the value of the current roman numeral is less than
        // the value of the next roman numeral (e.g. XL in XLII),
        // set new sum to be the addition of old sum 
        // plus the value of the next roman numeral 
        // minus the value of the current roman numeral (e.g 0 + 50 - 10).
        // Skip the next roman numeral and go to the one after that 
        // (e.g skip L and go to I)
        // Re-evaluate the condition of the for loop
        // and recheck the if...else statement if necessary
        // Else (e.g first I in XLII):
        // set new sum to be the addition of old sum
        // plus the value of the current roman numeral (e.g 40 + 1).
        // Go to the next roman numeral
        // Re-evaluate the condition of the for loop
        // and recheck the if...else statement if necessary
        if (conversion[s[i]] < conversion[s[i + 1]]) {
            sum = sum + conversion[s[i + 1]] - conversion[s[i]];
            i++;
        } else {
            sum = sum + conversion[s[i]];
        }
    }

    return sum;

};