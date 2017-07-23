import os
import sys

def CountRecords(filevalue1,filevalue2):

	with open(filevalue1, "r") as infile1:
		data1 = infile1.read()  # Read the contents of the file into memory.		
	file1_list = data1.splitlines()

	with open(filevalue2, "r") as infile2:
		data2 = infile2.read()  # Read the contents of the file into memory.			
	file2_list = data2.splitlines()
	numLPRecords = len(file2_list)

	sum = 0
	for line1 in file1_list:
		address1 = line1.split(",")
		if len(address1) > 1:
			# print address1
			street1   = address1[1].split(" ")
			if len(street1) > 1:
				strRecord1 = street1[0] + street1[1]
				# Read short list
				for line2 in file2_list:
					address2 = line2.split(",")
					street2   = address2[1].split(" ")
					strRecord2 = street2[0] + street2[1]
					if strRecord1 == strRecord2:
						sum = sum + 1
						# print sum,": ",line2
		
	return sum
	


