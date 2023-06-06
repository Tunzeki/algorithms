/**
 * Visit https://leetcode.com/problems/kids-with-the-greatest-number-of-candies/description/
 * for problem description
 * 
 * There are n kids with candies. You are given an integer array candies, 
 * where each candies[i] represents the number of candies the ith kid has, 
 * and an integer extraCandies, denoting the number of extra candies that you have.
 * 
 * Return a boolean array result of length n, where result[i] is true if, 
 * after giving the ith kid all the extraCandies, 
 * they will have the greatest number of candies among all the kids, or false otherwise.
 * 
 * Note that multiple kids can have the greatest number of candies.

 * @param {number[]} candies
 * @param {number} extraCandies
 * @return {boolean[]}
 */
var kidsWithCandies = function (candies, extraCandies) {
    // Initialize the return variable to an empty array
    let booleanArray = [];
    // Put the length of the candies array in a variable
    const length = candies.length;
    // Determine the greatest number of candies any of the kids have
    // Note that I can't call sort() directly on candies here because
    // that would mutate the candies array. I need the original positions intact
    // Alternatively, I could call slice on candies and mutate this copy using sort()
    let greatest = candies[0];
    for (number of candies) {
        if (number > greatest) {
            greatest = number;
        }
    }

    // Add true or false to booleanArray... 
    for (let i = 0; i < length; i++) {
        if (candies[i] + extraCandies >= greatest) {
            booleanArray.push(true);
        } else {
            booleanArray.push(false);
        }
    }

    return booleanArray;

};