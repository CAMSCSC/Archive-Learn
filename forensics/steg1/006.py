>>> component = int(201) #Set component value to 201
>>> bin(component) #Binary of component
'0b11001001'
>>> component & ~1 #Set the last bit to 0
200
>>> component & int('0b11111110', 2) #Another way to set the last bit to 0
200
>>> bin = int(1)
>>> 200 | 1 #Set the LSB to the bin value
201
>>> 200 | (int('0b00000001', 2)) #Another way to do set the LSB data
201