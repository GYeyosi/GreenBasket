
CREATE TABLE cartpayment (

cartid INT NOT NULL   ,

paymentid INT NOT NULL   ,

flat VARCHAR(255) ,

street VARCHAR(255) ,

state VARCHAR(255) ,

phone VARCHAR(255) ,

zip INT(6) ,

PRIMARY KEY (cartid,paymentid)

);


