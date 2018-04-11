
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


-- GET PRICES AND ITEMS OF CART
select * from cart as c inner  join stock as s on c.vegname=s.vegname and c.dealerid=s.dealerid and c.region=s.region ;
select c.*,s.price from cart c join (select  dealerid,vegname,region,price from stock) s on c.dealerid=s.dealerid and c.vegname=s.vegname and c.region=s.region  ;


--GET DETAILS OF CART AND TOTAL (PAYMENT)
select c.username,sum(c.quantity*s.price),c.paymentstatus,c.paymentat from cart c  join (select  dealerid,vegname,region,price from stock) s on c.dealerid=s.dealerid and c.vegname=s.vegname and c.region=s.region  group by c.username,paymentstatus,paymentat;


--REVENUE
select dealerid,region,sum(price*quantity) from stock group by dealerid,region;
-- BY CITIES
select region,sum(price*quantity) from stock group by region;
select sum(price*quantity) as total_revenue from stock;


--GOVT DIFFERENCE
select s.region,s.dealerid,s.vegname,s.price as dealer_price,g.price as govt_price from govt as g join (select  dealerid,vegname,region,price from stock) as s on g.vegname=s.vegname and g.region=s.region;


select sum(p.govt*p.quantity) as total_revenue from ( select s.quantity as quantity,g.price as govt from govt as g join (select  dealerid,vegname,region,price,quantity from stock) as s on g.vegname=s.vegname and g.region=s.region) p;



