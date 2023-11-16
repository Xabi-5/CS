create database dbname;
grant all on dbname.* to userweb@'localhost';

use dbname;


create table login (
    id int primary key auto_increment,
    user varchar(20) not null,
    userPassw varchar(20) not null
);

insert into login (user, userPassw) values ('alumno', 'abc123.');
insert into login (user, userPassw) values ('admin', 'root');
