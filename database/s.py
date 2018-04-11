import random
import time

veg=open('vegetable.txt','r').read()
city=open('cities.txt','r').read()
dealer=open('dealers.txt','r').read()
query=open('query.txt','a')
vegs=veg.split(" ")
cities=city.split(" ")
dealers=dealer.split(" ")
for c in cities:
	for d in dealers:
		for v in vegs:
			ct=random.randrange(1,1000000)
			random.seed(ct)
			q=random.randrange(30,50)
			p=random.randrange(13,18)
			k="INSERT into stock values ('%s','%s','%s',%d,%d);\n" %(v,c,d,q,p)
			query.write(k)