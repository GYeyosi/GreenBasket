
CREATE TABLE stock (

vegname VARCHAR(50) NOT NULL    ,

region VARCHAR(50) NOT NULL  ,

dealerid VARCHAR(50) NOT NULL  ,

quantity int NOT NULL,

price float(4,2) NOT NULL,

PRIMARY KEY (vegname,region,dealerid)

);

INSERT INTO stock values('potato','Hyderabad','Agastya0',87,12.00);
INSERT INTO stock values('cabbage','Hyderabad','Agastya1',87,13.00);
INSERT INTO stock values('onion','Hyderabad','Agastya2',87,11.00);
INSERT INTO stock values('brinjal','Hyderabad','Agastya3',87,15.00);
INSERT INTO stock values('tomato','Hyderabad','Agastya5',7,16.00);

