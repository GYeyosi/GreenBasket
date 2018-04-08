
CREATE TABLE stock (

vegname VARCHAR(255) NOT NULL    ,

region VARCHAR(50) NOT NULL  ,

dealerid VARCHAR(50) NOT NULL  ,

quantity int NOT NULL,

price float(4,2) NOT NULL,

PRIMARY KEY (vegname,region,dealerid)

);

INSERT INTO stock values('potato','Hyderabad','Agastya0',87,12.00);
INSERT INTO stock values('potato','Hyderabad','Agastya1',87,12.00);
INSERT INTO stock values('potato','Hyderabad','Agastya2',87,12.00);
INSERT INTO stock values('potato','Hyderabad','Agastya3',87,12.00);
INSERT INTO stock values('potato','Hyderabad','Agastya4',87,12.00);
INSERT INTO stock values('potato','Hyderabad','Agastya5',87,12.00);
INSERT INTO stock values('potato','Hyderabad','Agastya6',87,12.00);
INSERT INTO stock values('potato','Hyderabad','Agastya7',87,12.00);

