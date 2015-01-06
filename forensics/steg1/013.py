	for row in range(height):
		for col in range(width):

			if index + 3 <= len(message_bits) :

				(r, g, b) = img.getpixel((col, row))

				r = setlsb(r, message_bits[index])
				g = setlsb(g, message_bits[index+1])
				b = setlsb(b, message_bits[index+2])

				encoded.putpixel((col, row), (r, g , b))

			index += 3

	return encoded