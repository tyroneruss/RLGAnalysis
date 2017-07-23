import sys
import re   

def RemoveOldRecords(file1,file2):

	filevalue1 = './fc-Mailer-' + file1 + ".csv"
	filevalue2 = './fc-Mailer-' + file2 + ".csv"
		
	outfile = open('./fc-Mailer-Results.csv', 'w')

	with open(filevalue1, "r") as infile1:
		data1 = infile1.read()  # Read the contents of the file into memory.			
	file1_list = data1.splitlines()

	with open(filevalue2, "r") as infile2:
		data2 = infile2.read()  # Read the contents of the file into memory.			
	file2_list = data2.splitlines()

	i = 0
	t = 0
	k = 0
	
	line1 = ''
	
	duplicate = []
	
	newlist = file1_list
	for line1 in file1_list:
		t = t + 1
		address1 = line1.split(",")
		street1   = address1[1].split(" ")
		strRecord1 = street1[0] + street1[1]
		# Read short list
		for line2 in file2_list:
			address2 = line2.split(",")
			street2   = address2[1].split(" ")
			# print k,' ',street2[0],' ',street2[1]
			if len(street2) > 1:
				strRecord2 = street2[0] + street2[1]				
				if strRecord1 == strRecord2:
					newlist.remove(line1)
					k = k + 1

	for line in newlist:
		i = i + 1
		strAddLine = line + "\n"
		print i,': ',line
		outfile.write(strAddLine)
					
	sum = t - k
	print "\nResults - removed ", k, " records"
	print "\nResults - dup records new count: ",

def main(argv):

	# My code here
	if len(argv) < 3:
		print("\nError! You do not have enough arguments")
		exit()

	file1 = sys.argv[1]
	file2 = sys.argv[2]	
	
	RemoveOldRecords(file1,file2)
	
# Initiate main program	
if __name__ == "__main__":
    main(sys.argv)
