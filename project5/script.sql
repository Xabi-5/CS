create database formula1;
create user 'f1manager'@'localhost' identified by 'abc123.';
grant all on formula1.* to f1manager@'localhost';

use formula1;
create table driver (
    driverNumber int not null PRIMARY KEY,
    name varchar(33),
    surname varchar(33),
    age int,
    country varchar(20)
);

create table car (
    carID int auto_increment PRIMARY KEY,
    chassis varchar(33),
    engine varchar(33),
    engineManufacturer varchar(33)
);

create table team (
    teamID int auto_increment PRIMARY KEY,
    name varchar(50),
    colour varchar(33),
    country varchar(20),
    headquarters varchar(33),
    driver1 int,
    driver2 int,
    car int,
    CONSTRAINT dr1_FK FOREIGN KEY (driver1) REFERENCES driver(driverNumber) ON DELETE SET null,
    CONSTRAINT dr2_FK FOREIGN KEY (driver2) REFERENCES driver(driverNumber) ON DELETE SET null,
    CONSTRAINT car_FK FOREIGN KEY (car) REFERENCES car(carID) ON DELETE SET null
);


insert into driver (driverNumber,name, surname, age, country)
 values (1,'Max','Verstappen',26,'Netherlands');

insert into driver (driverNumber,name, surname, age, country)
 values (2,'Logan','Sargeant',22,'United States');

insert into driver (driverNumber,name, surname, age, country)
 values (3,'Daniel','Ricciardo',34,'Australia');

insert into driver (driverNumber,name, surname, age, country)
 values (4,'Lando','Norris',23,'UK');

insert into driver (driverNumber,name, surname, age, country)
 values (10,'Pierre','Gasly',27,'France');

insert into driver (driverNumber,name, surname, age, country)
 values (11,'Sergio','Perez',33,'Mexico');

insert into driver (driverNumber,name, surname, age, country)
 values (14,'Fernando','Alonso',42,'Spain');

insert into driver (driverNumber,name, surname, age, country)
 values (16,'Charles','Leclerc',26,'Monaco');

insert into driver (driverNumber,name, surname, age, country)
 values (18,'Lance','Stroll',25,'Canada');

insert into driver (driverNumber,name, surname, age, country)
 values (20,'Kevin','Magnussen',31,'Denmark');

insert into driver (driverNumber,name, surname, age, country)
 values (22,'Yuki','Tsunoda',23,'Japan');

insert into driver (driverNumber,name, surname, age, country)
 values (23,'Alex','Albon',27,'Thailand');

insert into driver (driverNumber,name, surname, age, country)
 values (24,'Zhou','Guanyu',24,'China');

insert into driver (driverNumber,name, surname, age, country)
 values (27,'Nico','Hulkenberg',36,'Germany');

insert into driver (driverNumber,name, surname, age, country)
 values (31,'Esteban','Ocon',27,'France');

insert into driver (driverNumber,name, surname, age, country)
 values (44,'Lewis','Hamilton',38,'UK');

insert into driver (driverNumber,name, surname, age, country)
 values (55,'Carlos','Sainz',38,'Spain');

insert into driver (driverNumber,name, surname, age, country)
 values (63,'George','Russell',25,'UK');

insert into driver (driverNumber,name, surname, age, country)
 values (77,'Valtteri','Bottas',34,'Finland');

insert into driver (driverNumber,name, surname, age, country)
 values (81,'Oscar','Piastri',22,'Australia');



 -- Cars

insert into car (chassis, engine, engineManufacturer )
values ( 'Alfa Romeo C43', 'Ferrari 066/10', 'Ferrari');

insert into car (chassis, engine, engineManufacturer )
values ('Alpha Tauri AT04', 'Honda RBPTH001', 'Honda RBPT');

insert into car (chassis, engine, engineManufacturer )
values ( 'Alpine A523', 'Renault E-Tech RE23', 'Renault');

insert into car (chassis, engine, engineManufacturer )
values ( 'Aston Martin AMR23', 'Mercedes-AMG F1 M14', 'Mercedes');

insert into car (chassis, engine, engineManufacturer )
values ( 'Ferrari SF-23', 'Ferrari 066/10', 'Ferrari');

insert into car (chassis, engine, engineManufacturer )
values ( 'Haas VF-23', 'Ferrari 066/10', 'Ferrari');

insert into car (chassis, engine, engineManufacturer )
values ( 'McLaren MCL60', 'Mercedes-AMG F1 M14', 'Mercedes');

insert into car (chassis, engine, engineManufacturer )
values ('Mercedes F1 W14', 'Mercedes-AMG F1 M14', 'Mercedes');

insert into car (chassis, engine, engineManufacturer )
values ('Red Bull RB19', 'Honda RBPTH001 ', 'Honda RBPT');

insert into car (chassis, engine, engineManufacturer )
values ( 'Williams FW45', 'Mercedes-AMG F1 M14', 'Mercedes');

-- 

insert into team (name, colour, country, headquarters, driver1, driver2, car)
values ('Alfa Romeo', '#c92d4b', 'Switzerland', 'Hinwil', 77, 24, 1);

insert into team (name, colour, country, headquarters, driver1, driver2, car)
values ('Alpha Tauri', '#5e8faa', 'Italy', 'Faenza', 22, 3, 2);

insert into team (name, colour, country, headquarters, driver1, driver2, car)
values ('Alpine', '#2293d1', 'France', 'Enstone', 10, 31, 3);

insert into team (name, colour, country, headquarters, driver1, driver2, car)
values ('Aston Martin', '#358c75', 'UK', 'Silverstone', 14, 18, 4);

insert into team (name, colour, country, headquarters, driver1, driver2, car)
values ('Ferrari', '#f91536', 'Italy', 'Maranello', 16, 55, 5);

insert into team (name, colour, country, headquarters, driver1, driver2, car)
values ('Haas', '#b6babd', 'USA', 'Kannapolis', 20, 27, 6);

insert into team (name, colour, country, headquarters, driver1, driver2, car)
values ('McLaren', '#f58020', 'UK', 'Woking', 4, 81, 7);

insert into team (name, colour, country, headquarters, driver1, driver2, car)
values ('Mercedes', '#6cd3bf', 'Germany', 'Brackley', 44, 63, 8);

insert into team (name, colour, country, headquarters, driver1, driver2, car)
values ('Red Bull', '#3671c6', 'Austria', 'Milton Keynes', 1, 11, 9);

insert into team (name, colour, country, headquarters, driver1, driver2, car)
values ('Williams', '#37bedd', 'UK', 'Grove', 2, 23, 10);

drop table team;
drop table car;
drop table driver;








--Facer lista despregable para seleccionar o equipo ao que pertenecen