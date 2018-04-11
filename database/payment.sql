
CREATE TABLE payment (

username VARCHAR(50) NOT NULL UNIQUE,

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
