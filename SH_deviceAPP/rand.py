import random
from time import sleep 


while(1):
	file = open("myfile", "w")
	file.write((str)(random.randint(0,1))) 
	file.close()

	sleep(1)