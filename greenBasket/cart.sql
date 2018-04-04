
/*needs to be run in phpmyadmin*/
/* add stock atribute too the vegetable table*/

create table vegetable(id varchar(50) primary key,name varchar(100) not null,price float not null,
	image varchar(100) not null);

insert into vegetable values('v1','tomato','21','tom.jpg');
insert into vegetable values('v2','potato','22','potato.jpg');
insert into vegetable values('v3','onion','50','onion.jpg');
insert into vegetable values('v4','brinjal','30.50','brinjal.jpg');
insert into vegetable values('v5','cabbage','41','cabbage.jpg');



