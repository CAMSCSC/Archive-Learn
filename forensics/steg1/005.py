def setlsb(component, bit):
	return component & ~1 | int(bit)