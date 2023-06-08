/**
 * Visit https://leetcode.com/problems/can-place-flowers/description/
 * for problem description
 * 
 * You have a long flowerbed in which some of the plots are planted, and some are not. 
 * However, flowers cannot be planted in adjacent plots.
 * Given an integer array flowerbed containing 0's and 1's, where 0 means empty 
 * and 1 means not empty, and an integer n, 
 * return true if n new flowers can be planted in the flowerbed 
 * without violating the no-adjacent-flowers rule and false otherwise.

 * @param {number[]} flowerbed
 * @param {number} n
 * @return {boolean}
 */
var canPlaceFlowers = function (flowerbed, n) {
    // Initialize plantableSpots, the total number of plots new flowers
    // can be planted to 0
    // Define a constant variable, length, for the total number of plots in the flowerbed
    let plantableSpots = 0;
    const length = flowerbed.length;

    // Since flowers cannot be planted in adjacent plots, the following must be true:
    // 1. If a plot is tagged 1, the plot next to it cannot be a plantable spot,
    // thus skip i + 1 and go to i + 2
    // 2. If a plot is tagged 0, it is a plantable spot if and only if:
    // the plot before it (if there is one) is tagged 0 
    // and the plot after it (if there is one) is tagged 0
    // Once you find a plantable spot, skip the next plot,
    // it automatically cannot be a plantable spot
    for (let i = 0; i < length; i++) {
        if (flowerbed[i] === 1) {
            i++; // skip i + 1
        } else if (i === 0 && i === (length - 1)) {
            // for when flowerbed = [0]
            plantableSpots++;
        } else if (i === 0 && flowerbed[i + 1] === 0) {
            // for when flowerbed starts with 0 and the next plot is tagged 0
            plantableSpots++;
            i++;
        } else if (flowerbed[i - 1] === 0 && i !== (length - 1) && flowerbed[i + 1] === 0) {
            // for when this plot and the plots before and after it are all tagged 0
            plantableSpots++;
            i++;
        } else if (flowerbed[i - 1] === 0 && i == (length - 1)) {
            // for when flowerbed ends with 0 and the plot before that is also tagged 0
            plantableSpots++;
        }
    }

    // n new flowers can be planted if there are n or more plantableSpots
    if (plantableSpots >= n) {
        return true;
    }

    return false;
};