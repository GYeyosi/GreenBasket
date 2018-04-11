
CREATE TABLE cart (

username VARCHAR(50) NOT NULL UNIQUE,

vegname VARCHAR(50) NOT NULL,

dealerid VARCHAR(50) NOT NULL,

region VARCHAR(50) NOT NULL,

quantity int NOT NULL ,

paymentstatus VARCHAR(255) DEFAULT 'no' ,

paymentat DATETIME  DEFAULT '1000-10-10 00:00:00' ,

PRIMARY KEY (username,vegname,dealerid,region,paymentat)

);

