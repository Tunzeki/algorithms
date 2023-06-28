/**
 * Visit https://leetcode.com/problems/pascals-triangle/description/
 * for full problem description
 * 
 * Given an integer numRows, return the first numRows of Pascal's triangle.
 * In Pascal's triangle, each number is the sum of the two numbers directly above it
 * 
 * @param {number} numRows
 * @return {number[][]}
 */
var generate = function (numRows) {
    if (numRows === 1) {
        return [[1]];
    }

    let pascalTriangle = [[1]]
    for (let i = 1; i < numRows; i++) {
        // Each element in the triangle is an array
        pascalTriangle[i] = [];
        lengthOfPrevArray = i; // pascalTriangle[i - 1].length
        for (let j = 0; j <= lengthOfPrevArray; j++) {
            // The first and last numbers in any row (array) of the triangle are 1s
            if (j === 0 || j == lengthOfPrevArray) {
                pascalTriangle[i][j] = 1;
            } else {
                // Other numbers in the row (array) are the sums of the two numbers directly above it
                // i.e the sums of the numbers in the previous array at the same position, j, plus 
                // the previous position, j - 1
                pascalTriangle[i][j] =
                    pascalTriangle[i - 1][j - 1] + pascalTriangle[i - 1][j];
            }
        }
    }

    return pascalTriangle;



};