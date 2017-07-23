# Build Georgia listing
import sys
import os
import shutil
import CountModule

from os import listdir
from os.path import isfile, join

def CountLPrcounts(filename):
	addLeads    = 0
	num_clients = 0
	txcount		= 0
	gacount 	= 0
	
	with open(filename, "r") as infile:
		data = infile.read()  # Read the contents of the file into memory.		
	file_list = data.splitlines()	
	addLeads = len(file_list)	
	
	for line in file_list:	
		list = line.split(',')
		if list[5].find('New') > -1 or list[5].find('Processing') > -1 or  list[5].find('Trail Approved') > -1:
			num_clients = num_clients + 1
			
		if 'TX' in list:
			txcount = txcount + 1 	
		else: 
			# print list
			gacount = gacount + 1 
	
	return addLeads,num_clients,gacount,txcount
	
def main(argv):

	file1 = ""
	file2 = ""
	sum   = 0
	i = 0
	
	AddcLeads    = 0
	TotalLeads   = 0
	Addclients   = 0
	Totalclients = 0	
	GAsum = 0
	TXsum = 0
	
	filename = "./Results/MailerLPMatric.csv"
	outfile  = open(filename,'w')

	filename = "./Results/Totals.csv"
	totalfile  = open(filename,'w')
		
	# MonthArray = ['Aug','Sept','Oct','Nov','Dec','Jan','Feb','Mar','April','June']
	MonthArray = ['June','April','Mar','Feb','Jan','Dec','Nov','Oct','Sept','Aug']
	
	# Enter the July later
	filepath = 'Month/LP' 
	for month in MonthArray:
		LPfile = 'LoanPost/' + 'fc-Mailer-' + month + '-LP.csv'
		cltsLeads,Addclients,GAcount,TXcount = CountLPrcounts(LPfile)
		strMatrics = month + ',' + str(cltsLeads) + ' ,' + str(Addclients) + ',' + str(GAcount) + ',' + str(TXcount) + '\n'
		print strMatrics
		outfile.write(strMatrics)
		GAsum = GAsum + GAcount
		TXsum = TXsum + TXcount
		Totalclients = Totalclients + Addclients		
		TotalLeads   = TotalLeads + cltsLeads
	
	
	floatClients = float(Totalclients) * 1.00
	floatleads	 = float(TotalLeads) * 1.00

	SuccessRate = float(floatClients/floatleads * 100.00)
	SuccessRate = str(int(round(SuccessRate)))
	
	strStats = 'Total # of Leads:,' + str(TotalLeads) + '\n'
	strStats = strStats + 'Total # of Clients:,' + str(Totalclients) + '\n'
	strStats = strStats + 'Total # of GA leads,' + str(GAsum) + '\n'
	strStats = strStats + 'Total # of TX leads:,' + str(TXsum) + '\n'
	strStats = strStats + 'The success rate Clients per leads:.' + SuccessRate + '%\n'
	totalfile.write(strStats)
	
	print "Total # of Leads is",TotalLeads
	print "Total # of Clients is",Totalclients
	print "Total # of GA leads is",GAsum
	print "Total # of TX leads is",TXsum
	print "The Lmod success rate is",SuccessRate,'%'

	outfile.close()
	totalfile.close()
	
# Initiate main program	
if __name__ == "__main__":
    main(sys.argv)




