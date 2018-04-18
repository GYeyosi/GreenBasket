CREATE TABLE govt (

vegname VARCHAR(50) NOT NULL    ,

region VARCHAR(50) NOT NULL  ,

price float(4,2) NOT NULL,

createdat DATETIME DEFAULT CURRENT_TIMESTAMP,

PRIMARY KEY (vegname,region,createdat)

);