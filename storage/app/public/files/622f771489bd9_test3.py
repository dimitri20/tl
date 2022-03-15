
import math

ans = 0

for n in range(1, 999999999):
    sum = (math.sqrt(n) + math.sqrt(n+1))*math.sqrt(n*(n+1))
    sum = 1/sum
    print(sum)
