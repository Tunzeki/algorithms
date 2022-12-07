"""
In this challenge, the task is to debug the existing code to successfully execute all provided test files.

Given two strings consisting of digits 0 and 1 only, find the XOR of the two strings.

XOR means Exclusive OR. 
'The truth table of A XOR B shows that it outputs true whenever the inputs differ' (Wikipedia).

Debug the given function strings_xor to find the XOR of the two given strings appropriately.

Note: You can modify at most three lines in the given code and you cannot add or remove lines to the code.

"""

def strings_xor(s, t):
    res = ""
    for i in range(len(s)):
        if s[i] == t[i]:
            res = res + '0'
        else:
            res = res + '1'

    return res


s = input()
t = input()
print(strings_xor(s, t))
