/**
 * Visit https://leetcode.com/problems/baseball-game/description/
 * for full problem description
 * 
 * You are keeping the scores for a baseball game with strange rules. 
 * At the beginning of the game, you start with an empty record.
 * 
 * You are given a list of strings operations, 
 * where operations[i] is the ith operation you must apply to the record 
 * and is one of the following:
 * - An integer x.
 *  - Record a new score of x.
 * - '+'.
 *  - Record a new score that is the sum of the previous two scores.
 * - 'D'.
 *  - Record a new score that is the double of the previous score.
 * - 'C'.
 *  - Invalidate the previous score, removing it from the record.
 * 
 * Return the sum of all the scores on the record 
 * after applying all the operations.
 * 
 * The test cases are generated such that the answer 
 * and all intermediate calculations fit in a 32-bit integer 
 * and that all operations are valid.
 * 
 * @param {string[]} operations
 * @return {number}
 */
var calPoints = function (operations) {
    // Start with an empty record
    const score = [];
    const length = operations.length;

    for (let i = 0; i < length; i++) {
        if (operations[i] === '+') {
            // Record a new score that is the sum of the previous two scores
            let scoreLength = score.length;
            score.push(score[scoreLength - 1] + score[scoreLength - 2]);
        } else if (operations[i] === 'D') {
            // Record a new score that is the double of the previous score
            score.push(2 * (score[score.length - 1]));
        } else if (operations[i] === 'C') {
            // Invalidate the previous score, removing it from the record
            score.pop();
        } else {
            // Record a new score of x
            score.push(Number(operations[i]));
        }
    }

    // Return the sum of all scores on the record
    // return score.reduce((total, value) => total + value, 0);
    // OR

    let sum = 0;

    for (let i = 0; i < score.length; i++) {
        sum = sum + score[i];
    }

    return sum;

};