
CREATE TABLE payment (

username VARCHAR(50) NOT NULL ,

paymentat DATETIME  DEFAULT '1000-10-10 00:00:00' ,

price float(6,2) NOT NULL,

flat VARCHAR(255) ,

street VARCHAR(255) ,

city VARCHAR(255) ,

phone VARCHAR(255) ,

zip INT(6) ,

isprimaryaddress  VARCHAR(255) DEFAULT 'yes',

PRIMARY KEY (username,paymentat)

);


insert into payment (username,paymentat,price) values('dedsec','2018-04-11 11:32:07',112);
insert into payment (username,paymentat,price) values('sandeep','2018-04-11 11:32:13',103);