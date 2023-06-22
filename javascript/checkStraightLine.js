/**
 * Visit https://leetcode.com/problems/check-if-it-is-a-straight-line/description/
 * for problem description
 * 
 * You are given an array coordinates, coordinates[i] = [x, y], 
 * where [x, y] represents the coordinate of a point. 
 * Check if these points make a straight line in the XY plane.
 * 
 * @param {number[][]} coordinates
 * @return {boolean}
 */
var checkStraightLine = function (coordinates) {
    // Recall this property of a straight line:
    // The gradient (or slope) of a straight line at any two points on the line
    // is equal.
    // For this reason, pick the first two successive points on the line
    // and find its gradient, m
    const y = coordinates[0][1];
    const x = coordinates[0][0];
    let y1 = coordinates[1][1];
    let x1 = coordinates[1][0];
    const m = (y - y1) / (x - x1);
    const length = coordinates.length;

    // Using the first coordinate of the line (x, y) as a reference point,
    // find the gradient of the line, newM, using other coordinates as the second point.
    // A straight line would have m equals to newM
    //
    // (Checking if the absolute values of m and newM equals Infinity
    // accounts for the edge case in which the straight line is along the y-axis
    // and the gradient, depending on the two points selected, would be Infinity or -Infinity)
    //
    // If not, return false
    for (let i = 2; i < length; i++) {
        y1 = coordinates[i][1];
        x1 = coordinates[i][0];
        let newM = (y - y1) / (x - x1);
        if (Math.abs(m) === Infinity && Math.abs(newM) === Infinity) {
            continue;
        }
        if (m !== newM) {
            return false;
        }
    }

    return true;

};