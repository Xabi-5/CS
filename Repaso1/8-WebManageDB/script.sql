create database review;

create user 'gestor'@'localhost' identified by 'abc123.';
grant all on review.* to gestor@'localhost';

use review;
create table category (
    id int primary key auto_increment,
    name varchar(200) unique
);

create table product (
    id integer primary key auto_increment,
    name varchar(200),
    description varchar(250),
    picture varchar(250),
    idCategory int,
    CONSTRAINT FK_Category FOREIGN KEY (idCategory) 
    REFERENCES category(id) ON DELETE SET null
);

create table user (
    id integer primary key auto_increment,
    dni varchar(200),
    name varchar(250),
    address varchar(250), 
    login varchar(250),
    password varchar(250),
    admin boolean default false
);

insert into category (name) values ('Fruit');
insert into category (name) values ('Bakery');
insert into category (name) values ('Snacks');

insert into product (name, description, idCategory) 
values ('Oranges', '1kg Seville oranges', (select id from category where name = "Fruit")),
        ('Watermelon', '2kg watermelon', (select id from category where name = "Fruit")),
        ('Baguette', 'One 250g baguette', (select id from category where name = "Bakery")),
        ('Tuna empanada', '30cm diameter tuna empanada', (select id from category where name = "Bakery")),
        ('Pringles Paprika', 'Paprika flavoured pringles chips', (select id from category where name = "Snacks")),
        ('Pringles Sour Cream', 'Sour cream flavoured pringles chips', (select id from category where name = "Snacks"));

insert into user (dni, name, address, login, password, admin)
    values('00000000A', 'James', 'Raleigh 8', 'jamesRaleigh', 'abc', true),
    ('11111111B', 'Matthew', 'Tucson 7', 'matTucson', 'efg', false),
    ('22222222C', 'Alfred', 'Chicago 2', 'alChicago', 'typewriter', false);
