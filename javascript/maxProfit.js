/**
 * Visit https://leetcode.com/problems/best-time-to-buy-and-sell-stock/description/
 * for full problem description
 * 
 * You are given an array prices where prices[i] is the price of a given stock on the ith day.
 * You want to maximize your profit by choosing a single day to buy one stock 
 * and choosing a different day in the future to sell that stock.
 * Return the maximum profit you can achieve from this transaction. 
 * If you cannot achieve any profit, return 0.
 * 
 * @param {number[]} prices
 * @return {number}
 */
var maxProfit = function (prices) {
    // Understand that the prices you buy and sell at are determined retrospectively,
    // after you have figured out what two prices will give you the highest profit.

    // Variable cheaperBuy represents the cheaper price you could possibly buy at,
    // However, a cheaperBuy in the future may NOT necessarily give you 
    // the maximum profit. Thus, it is important to keep cheaperBuy
    // and buy, the price you'd eventually buy at, different.
    // This way, even if you wanted to return the buying price,
    // youu'd return the correct value.
    // To get started,
    // initialize cheaperBuy to the price on the first stock market day
    // and the maximum profit, highestProfit, to 0

    let buy;
    let sell;
    let cheaperBuy = prices[0];
    let highestProfit = 0
    const length = prices.length;


    for (let i = 1; i < length; i++) {
        // If the current stock market price is cheaper
        // than the previously set cheaperBuy, 
        // update cheaperBuy to today's stock price
        // Else if the current stock market price minus cheaperBuy
        // will give you the maximum profit:
        // cheaperBuy is the price you want to buy at
        // and today's stock market price is the price
        // you want to sell at,
        // and their difference gives you the maximum profit.
        if (prices[i] < cheaperBuy) {
            cheaperBuy = prices[i];
        } else if (prices[i] - cheaperBuy > highestProfit) {
            buy = cheaperBuy;
            sell = prices[i];
            highestProfit = sell - buy;
        }
    }

    return highestProfit;

};