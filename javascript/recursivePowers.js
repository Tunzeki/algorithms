/*
 *
 *
 * Write a recursive function power(x, n) that returns the value of x^n.
 * (assume that n is an integer)
 * 
 * Start by writing the base case.
 * 
 * Recursive case: n is odd
 * There are three recursive cases. In this step, write the recursive case for which n is odd.
 * You should use the provided function isOdd() to check if n is odd.
 * 
 * Recursive case: n is even
 * In this step, write the recursive case for which n is even.
 * You should use the provided function isEven() to check if n is even.
 * 
 * Recursive case: n is negative
 * In this step, write the recursive case for which n is negative.
 * Compute x raised to -n recursively, and return the reciprocal of that number.
*/
var isEven = function (n) {
    return n % 2 === 0;
};

var isOdd = function (n) {
    return !isEven(n);
};

var power = function (x, n) {
    // uncomment the line below to see how the power function is executed recursively
    // console.log("Computing " + x + " raised to power " + n + ".");

    // base case
    if (n === 0) {
        return 1;
    }
    // recursive case: n is negative
    if (n < 0) {
        return 1 / power(x, -n);
    }
    // recursive case: n is odd
    if (isOdd(n)) {
        return power(x, n - 1) * x;
    }
    // recursive case: n is even
    if (isEven(n)) {
        var y = power(x, n / 2);
        return y * y;
    }
};

var displayPower = function (x, n) {
    console.log(x + " to the " + n + " is " + power(x, n));
};

displayPower(3, 0); // outputs 1

displayPower(3, 1); // outputs 3

displayPower(3, 2); // outputs 9

displayPower(3, -1); // outputs float equivalent to 1/3 => 0.3333333333333333

displayPower(2, 5); // outputs 32

displayPower(7, -2); // outputs float equivalent to 1/49 => 0.02040816326530612

displayPower(-2, 2); // outputs 4

displayPower(3.5, 2); // outputs 12.25
