if __name__ == "__main__":
	steg = hide('carrier.png', 'The secret message.')
	steg.save('output.png')