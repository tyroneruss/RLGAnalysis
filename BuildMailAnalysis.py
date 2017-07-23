def RetreiveLPData(filename):

	num_clients = 0
	
	with open(filename, "r") as infile:
		data = infile.read()  # Read the contents of the file into memory.		
	file_list = data.splitlines()	
	
	numleads = len(file_list)
	for line in file_list:	
		list = line.split(',')
		if list[5].find('New') > -1 or list[5].find('Processing') > -1 or  list[5].find('Trail Approved') > -1:
			num_clients = num_clients + 1
	
	numleads = len(file_list)
	
	infile.close()	
	
	return numleads,num_clients