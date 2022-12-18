"""
In this challenge, the task is to debug the existing code to successfully execute all provided test files.

A number is called a smart number if it has an odd number of factors. 
Given some numbers, find whether they are smart numbers or not.

Debug the given function is_smart_number to correctly check if a given number is a smart number.
Note: You can modify only one line in the given code and you cannot add or remove any new lines.
"""

import math

def is_smart_number(num):
    # Only perfect squares have an odd number of factors.
    # If a number is a perfect square,
    # the square of its square root (done in separate steps)
    # must be exactly equal to the number
    # e.g. 4 is a perfect square
    # square root of 4 is 2
    # square of 2 (i.e. 2 * 2) is 4
    # 5 is not a perfect square
    # square root of 5 is approx 2.23607
    # square of 2.23607 is 5.000009
    # So, some precision is lost when you find the
    # square of the square root of a non-perfect square
    # in another line/step

    val = int(math.sqrt(num))
    if (val * val) == num:
        return True
    return False


for _ in range(int(input())):
    num = int(input())
    ans = is_smart_number(num)
    if ans:
        print("YES")
    else:
        print("NO")
