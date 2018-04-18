create table feedback(
username VARCHAR(50)  NOT NULL ,

email VARCHAR(255) NOT NULL,

rating VARCHAR(255) NOT NULL,

feedback VARCHAR(255) NOT NULL,

feedbackat DATETIME DEFAULT CURRENT_TIMESTAMP

)