import random
import time

veg=open('vegetable.txt','r').read()
city=open('cities.txt','r').read()
query=open('govtdata.txt','a')
vegs=veg.split(" ")
cities=city.split(" ")
for c in cities:
	for v in vegs:
		ct=random.randrange(1,1000000)
		random.seed(ct)
		
		p=random.randrange(10,15)
		k="INSERT into govt values ('%s','%s',%d);\n" %(v,c,p)
		query.write(k)