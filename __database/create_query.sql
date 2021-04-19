
create database if not exists corso_formarete;
/*show databases;*/
use corso_formarete;

create table if not exists User (
    userId int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    firstName varchar(255) NOT NULL,
    lastName varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    birthday DATE
);

show tables;
use corso_formarete;
describe user;


/*insert into user (firstName,lastName,email,birthday)
values ('Mario','Rossi','email@email.com','1980-12-01');*/

select * from user;