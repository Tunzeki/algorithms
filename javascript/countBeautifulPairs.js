/**
 * Visit https://leetcode.com/problems/number-of-beautiful-pairs/description/
 * for full problem description
 * 
 * You are given a 0-indexed integer array nums. 
 * A pair of indices i, j where 0 <= i < j < nums.length is called beautiful 
 * if the first digit of nums[i] and the last digit of nums[j] are coprime.
 * Return the total number of beautiful pairs in nums.
 * Two integers x and y are coprime 
 * if there is no integer greater than 1 that divides both of them. 
 * In other words, x and y are coprime 
 * if gcd(x, y) == 1, where gcd(x, y) is the greatest common divisor of x and y.
 * 
 * @param {number[]} nums
 * @return {number}
 */
var countBeautifulPairs = function (nums) {
    const length = nums.length;
    let beautifulPairs = 0;

    // The central idea here is to pick each number in the array (minus the last number) 
    // and compare its first digit with the last digit of all subsequent numbers in the array 
    // to see if they are coprime
    for (let i = 0; i < length - 1; i++) {
        // iFirstDigit is the first digit of each number in the array 
        const iFirstDigit = Number(nums[i].toString()[0]);
        // You need a second for loop in order to make the comparison
        for (j = i + 1; j < length; j++) {
            const jAsString = nums[j].toString();
            // jLastDigit is the last digit of subsequent numbers in the array
            const jLastDigit = Number(jAsString[jAsString.length - 1]);
            // If one (or both) of the two numbers you're comparing is 1,
            // that pair is a beautiful pair (i.e coprime)
            if (iFirstDigit === 1 || jLastDigit === 1) {
                beautifulPairs++;
                continue;
            } else if (iFirstDigit !== jLastDigit) { // CAN'T be coprime if both numbers are equal and ain't 1 
                // Rule out that both numbers have common factors in two steps
                let smaller;
                let bigger;
                if (iFirstDigit < jLastDigit) {
                    smaller = iFirstDigit;
                    bigger = jLastDigit;
                } else {
                    smaller = jLastDigit;
                    bigger = iFirstDigit;
                }
                // Step 1: Rule out that the smaller number itself is a factor of the bigger
                if (bigger % smaller === 0) {
                    continue;
                }
                // Step 2: Rule out any other factor of the smaller number being a factor of the bigger
                let commonFactor = 0;
                for (k = 2; k <= smaller / 2; k++) {
                    if (smaller % k === 0 && bigger % k === 0) {
                        commonFactor++;
                        break;
                    }
                }
                // If both numbers have no common factors (except 1, obviously), they are a beautiful pair
                if (commonFactor === 0) {
                    beautifulPairs++;
                }
            }
        }
    }

    return beautifulPairs;

};