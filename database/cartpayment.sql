
CREATE TABLE cartpayment (

username VARCHAR(50) NOT NULL   ,

paymentid INT NOT NULL AUTO_INCREMENT   ,

flat VARCHAR(255) ,

street VARCHAR(255) ,

state VARCHAR(255) ,

phone VARCHAR(255) ,

zip INT(6) ,

PRIMARY KEY (username,paymentid)

);


