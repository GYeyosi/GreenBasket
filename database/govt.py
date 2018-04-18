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
		k="INSERT into govt (vegname,region,price,createdat) values ('%s','%s',%d,'2017-04-18 01:04:32');\n" %(v,c,p)
		query.write(k)
