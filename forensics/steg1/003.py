>>> int('0b11111111', 2) - int('0b11111110', 2)
1 #Difference from changing the LSB
>>> int('0b11111111', 2) - int('0b01111111', 2)
128 #Difference from changing the MSB