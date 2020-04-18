import random

num = int(input("createMatrix-> "))
matrix = []
for row in range (0,num):
    matrix.append([])
for row in range (0,num):
    for col in range (0,num):
        matrix[row].append(col)
        matrix[row][col]=0
for row in range (0,num):
    for col in range (0,num):
        matrix[row][col] = random.randint(1,99)
print(matrix)
