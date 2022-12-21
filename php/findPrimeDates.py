"""
In this challenge, the task is to debug the existing code 
to successfully execute all provided test files.

Given two dates each in the format dd-mm-yyyy, 
you have to find the number of lucky dates between them (inclusive). To see if a date is lucky,

- Firstly, sequentially concatenate the date, month and year, 
into a new integer x erasing the leading zeroes.
- Now if x is divisible by either 4 or 7, then we call the date a lucky date.

For example, let's take the date "02-08-2024". 
After concatinating the day, month and year, we get x = 2082024. 
As x is divisible by 4 so the date "02-08-2024" is called a lucky date.

Debug the given function findPrimeDates and/or other lines of code, 
to find the correct lucky dates from the given input.

Note: You can modify at most five lines in the given code 
and you cannot add or remove lines to the code.
"""

import re
month = []


def updateLeapYear(year):
    """
    If a number is divisible by 400, 
    it is also divisible by 100 and by 4.
    If a number is divisible by 100, 
    it is also divisible by 4.

    Leap year:
    - A number divisible by 4 and 100 and 400
    - A number divisible by 4 but neither by 100 nor 400


    If a number is divisible by 400 (and 100 and 4), 
    it is a leap year.
    If a number is divisible by 100 (and 4) but not by 400,
    it is NOT a leap year.
    Other numbers divisible by 4 are leap years e.g. 2024

    Leap years have 29 days in February.
    """
    if year % 400 == 0:
        month[2] = 29  # 4
    elif year % 100 == 0:
        month[2] = 28  # 5
    elif year % 4 == 0:
        month[2] = 29
    else:
        month[2] = 28


def storeMonth():
    month[1] = 31
    month[2] = 28
    month[3] = 31
    month[4] = 30
    month[5] = 31
    month[6] = 30
    month[7] = 31
    month[8] = 31
    month[9] = 30
    month[10] = 31
    month[11] = 30
    month[12] = 31


def findPrimeDates(d1, m1, y1, d2, m2, y2):
    storeMonth()
    result = 0

    """
    To convert a date to integer:
    - multiply the day by 100 and add the month to it
    - then multiply the result by 10000 and add the year to it
    """
    while(True):
        x = d1
        x = x * 100 + m1
        x = x * 10000 + y1  # 1
        if x % 4 == 0 or x % 7 == 0:  # 2
            result = result + 1
        if d1 == d2 and m1 == m2 and y1 == y2:
            break
        updateLeapYear(y1)
        d1 = d1 + 1
        if d1 > month[m1]:
            m1 = m1 + 1
            d1 = 1
            if m1 > 12:
                y1 = y1 + 1
                m1 = 1  # 3
    return result


for i in range(1, 15):
    month.append(31)

line = input()
date = re.split('-| ', line)
d1 = int(date[0])
m1 = int(date[1])
y1 = int(date[2])
d2 = int(date[3])
m2 = int(date[4])
y2 = int(date[5])

result = findPrimeDates(d1, m1, y1, d2, m2, y2)
print(result)
