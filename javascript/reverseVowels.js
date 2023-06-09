/**
 * Visit https://leetcode.com/problems/reverse-vowels-of-a-string/description/
 * for problem description
 * 
 * Given a string s, reverse only all the vowels in the string and return it.
 * The vowels are 'a', 'e', 'i', 'o', and 'u', 
 * and they can appear in both lower and upper cases, more than once.
 * 
 * @param {string} s
 * @return {string}
 */
var reverseVowels = function (s) {
    const vowelsInString = [];
    const length = s.length;

    // Keep the vowels in s in the array vowelsInString
    for (let i = 0; i < length; i++) {
        if (s[i].toLowerCase() === 'a' ||
            s[i].toLowerCase() === 'e' ||
            s[i].toLowerCase() === 'i' ||
            s[i].toLowerCase() === 'o' ||
            s[i].toLowerCase() === 'u'
        ) {
            vowelsInString.push(s[i]);
        }
    }

    // Reverse the array
    vowelsInString.reverse();

    let stringWithReversedVowels = '';
    let j = 0;

    // stringWithReversedVowels gets all the characters in s, 
    // but with the vowels reversed.
    // Here's how this works:
    // When the character in s is a vowel, use the reversed vowel in vowelsInString
    for (let i = 0; i < length; i++) {
        if (s[i].toLowerCase() === 'a' ||
            s[i].toLowerCase() === 'e' ||
            s[i].toLowerCase() === 'i' ||
            s[i].toLowerCase() === 'o' ||
            s[i].toLowerCase() === 'u'
        ) {
            stringWithReversedVowels = stringWithReversedVowels + vowelsInString[j];
            j++;
        } else {
            stringWithReversedVowels = stringWithReversedVowels + s[i];
        }
    }

    return stringWithReversedVowels;

};