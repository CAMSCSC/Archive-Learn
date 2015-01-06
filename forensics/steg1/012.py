	npixels = width * height
	if len(message_bits) > npixels * 3:
		raise Exception("""The message you want to hide is too long (%s > %s).""" % (len(message_bits), npixels * 3))