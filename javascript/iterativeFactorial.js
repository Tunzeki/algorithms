/*
 * The factorial function returns the value n!
 * It uses a for loop to compute the product 1 * 2 * 3 * ... * n. 
 * The function is carefully written so that there is no need for a special case for when n equals 0
 */

var factorial = function (n) {
    var result = 1;
    for (var i = 1; i <= n; i++) {
        result = result * i;
    }
    return result;
};

console.log(factorial(5)); // outputs 120
console.log(factorial(0)); // outputs 1
console.log(factorial(3)); // outputs 6
console.log(factorial(6)); // outputs 720