
CREATE TABLE users (

username VARCHAR(50) primary key NOT NULL UNIQUE,

email VARCHAR(255) NOT NULL,

name VARCHAR(255) NOT NULL,

password VARCHAR(255) NOT NULL,

flat VARCHAR(255) ,

street VARCHAR(255) ,

city VARCHAR(255) ,

phone VARCHAR(255) ,

zip INT(6) ,

role VARCHAR(255) NOT NULL DEFAULT "civilian",

createdat DATETIME DEFAULT CURRENT_TIMESTAMP


);


