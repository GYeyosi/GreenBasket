
CREATE TABLE cart (

username VARCHAR(50) NOT NULL ,

vegname VARCHAR(50) NOT NULL,

dealerid VARCHAR(50) NOT NULL,

region VARCHAR(50) NOT NULL,

quantity int NOT NULL ,

paymentstatus VARCHAR(255) DEFAULT 'no' ,

paymentat DATETIME  DEFAULT '1000-10-10 00:00:00' ,

PRIMARY KEY (username,vegname,dealerid,region,paymentat)

);


select * from cart as c inner  join stock as s on c.vegname=s.vegname and c.dealerid=s.dealerid and c.region=s.region ;
select username,dealerid,region,sum(price) from cart as c inner  join stock as s on c.vegname=s.vegname and c.dealerid=s.dealerid and c.region=s.region group by vegname;


insert into cart (username,vegname,dealerid,region,quantity) values ('dedsec','Tomato','retailer1','Hyderabad',4);
insert into cart (username,vegname,dealerid,region,quantity) values ('dedsec','Potato','retailer2','Hyderabad',2);
insert into cart (username,vegname,dealerid,region,quantity) values ('satya','Tomato','retailer1','Allahabad',4);
insert into cart (username,vegname,dealerid,region,quantity) values ('satya','Cabbage','retailer3','Allahabad',2);
insert into cart (username,vegname,dealerid,region,quantity) values ('satya','Potato','retailer4','Allahabad',1);


insert into cart  values ('dedsec','Tomato','retailer1','Hyderabad',4,'yes',CURRENT_TIMESTAMP);
insert into cart  values ('dedsec','Potato','retailer2','Hyderabad',2,'yes',CURRENT_TIMESTAMP);
insert into cart values ('sandeep','Tomato','retailer1','Mumbai',1,'yes',CURRENT_TIMESTAMP);
insert into cart values ('sandeep','Onion','retailer2','Mumbai',2,'yes',CURRENT_TIMESTAMP);
insert into cart values ('sandeep','Potato','retailer4','Mumbai',3,'yes',CURRENT_TIMESTAMP);
