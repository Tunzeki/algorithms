"""
In this challenge, the task is to debug the existing code 
to successfully execute all provided test files.

Given an array of n distinct integers, transform the array into a zig zag sequence 
by permuting the array elements. 
A sequence will be called a zig zag sequence 
if the first k elements in the sequence are in increasing order 
and the last k elements are in decreasing order, where k = (n+1)/2. 
You need to find the lexicographically smallest zig zag sequence of the given array.
"""

def findZigZagSequence(a, n):
    a.sort()
    # mid is the midpoint of the given array
    # This is equal to (n+1)/2 - 1 because arrays in python are zero-indexed  
    mid = int((n + 1)/2) - 1
    # Swap the element in the middle with the last element
    # For this to work correctly, it should be done in a single line of code like so:
    a[mid], a[n-1] = a[n-1], a[mid]

    # Since the array was sorted at the beginning, the first k elements are in increasing order
    # so all that is left to do is to arrange the last k elements in decreasing order
    # Now, the first of these last k elements (element at the midpoint) is already the largest and the last is already the smallest
    # So, you have elements at position mid + 1 up to n - 2 to rearrange
    st = mid + 1
    ed = n - 2
    # Repeatedly swap elements at st and ed moving st one step forward and ed one step backward every time
    while(st <= ed):
        a[st], a[ed] = a[ed], a[st]
        st = st + 1
        ed = ed - 1

    for i in range(n):
        if i == n-1:
            print(a[i])
        else:
            print(a[i], end=' ')
    return


test_cases = int(input())
for cs in range(test_cases):
    n = int(input())
    a = list(map(int, input().split()))
    findZigZagSequence(a, n)
