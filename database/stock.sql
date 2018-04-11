CREATE TABLE stock (

vegname VARCHAR(50) NOT NULL    ,

region VARCHAR(50) NOT NULL  ,

dealerid VARCHAR(50) NOT NULL  ,

quantity int NOT NULL,

price float(4,2) NOT NULL,

PRIMARY KEY (vegname,region,dealerid)

);


