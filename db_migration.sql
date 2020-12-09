
create database canberk_test;

create table users
(	
   username varchar(255) not null unique,
   email varchar(255) not null unique,
   first_name varchar(255) not null, 
   last_name varchar(255) not null,
   mobile varchar(255) not null,
   password varchar(255) not null
)

insert into users (username, email, first_name, last_name, mobile, password) values
 ('canberk', 'email@email.com', 'Canberk', 'Temiz', '+15164654', '12341234');
