/*
 * Write a recursive function that returns the value of n!.
 * Start by writing the base case:
 *  if n is zero, then recursiveFactorial should just return the value 1.
 * 
 * Write the recursive case:
 *  - Make a recursive call to the function recursiveFactorial with an argument of n-1
 *  - Multiply the result of the recursive call by n
 *  - Return the result of the multiplication
 * You should do all of this in one line of code.
 * You should assume that n is positive.
 * 
 */

var recursiveFactorial = function (n) {
    // base case: 
    if (n === 0) {
        return 1;
    }

    // recursive case:
    return n * recursiveFactorial(n - 1);
};

console.log(recursiveFactorial(5)); // outputs 120
console.log(recursiveFactorial(0)); // outputs 1
console.log(recursiveFactorial(3)); // outputs 6
console.log(recursiveFactorial(6)); // outputs 720