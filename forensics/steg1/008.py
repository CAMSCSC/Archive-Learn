def a2bits_list(chars):
	list = [] #Create an empty list
	for x in chars: #Cycle through all characters
		data = bin(ord(x))[2:].rjust(8, '0') #Convert each character to binary, strip the '0b', and fill it up to 8 bits with empty 0s in the front
		list.append(data) #Add the data to the list
	return list #Return the list