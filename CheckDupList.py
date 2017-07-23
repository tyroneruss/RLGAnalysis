# Read in date 
import sys
import os
import re   

def title_except(s, exceptions):
   word_list = re.split(' ', s)       #re.split behaves as expected
   final = [word_list[0].capitalize()]
   for word in word_list[1:]:
      final.append(word in exceptions and word or word.capitalize())
   return " ".join(final)

def CheckDup(filename):
	srcfile = "fc-Mailer-" + filename + ".csv"

	# Build check for duplicate record in list 
	k=1
	i=0
	t=0
	b=1
	duplicate = []
	
	# Remove dupliacte records by address
	DupRemovefile = 'fc-Mailer-GA-' + filename + '.csv'	
	outfile = open(DupRemovefile,'w')

	with open(srcfile) as infile:
		seen = set()
		for line in infile:
			line = line.replace("\n","")
			line_lower = line.lower()			
			list = line_lower.split(",")
			address=list[1]
			temp = address.split(" ")
			count = len(temp)
			if len(temp) > 1 and temp[0] != '':
				address = temp[0] + temp[1]
				if address in seen:
					duplicate.append(address)				
					k=k+1
				else:		
					seen.add(address)
					street 		= title_except(list[1],"") 
					city 		= title_except(list[2],"")
					state 		= title_except(list[3],"")
					homeowmner 	= title_except(list[5],"And")
					county 		= title_except(list[6],"")
					strRecord = list[0] + "," + street + "," + city + "," + state + "," + list[4] + "," + homeowmner + "," + county + "\n"
					outfile.write(strRecord)
					t=t+1
					#print i,": ",list[0]," ",temp			
					if "Homeowner" not in line:
						i=i+1
					# Build new list
			else:
				#print b,"- Bad reocrds ", line
				# badfile.write(line)
				b = b + 1				

	print "\n\nFile being scan for duplicates: ",	srcfile
	print "\nTotal number of records found in error:",b-1
	
	print "\nTotal duplicate: ", k-1
	h=t-i
	print "\nTotal records without names: ", h
	print "\nTotal records with names: ", i-1
	print "\nTotal number validate records: ", t

	infile.close()
	outfile.close()
	
	# os.remove(fclistpath)
	
def main(argv):

	# My code here
	if len(argv) != 2:
		os.system("type help.txt")
		print("\nError! You do not have enough arguments")
		exit()

	Filename = sys.argv[1]	
	CheckDup(Filename)	

if __name__ == "__main__":
    main(sys.argv)

	
