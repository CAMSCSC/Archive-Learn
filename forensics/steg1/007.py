def a2bits_list(chars):
	return [bin(ord(x))[2:].rjust(8, '0') for x in chars]