drop database if exists moffatbay;
create database moffatbay;
use moffatbay;

create table customer(
                         customerID int auto_increment primary key,
                         email varchar(255),
                         password varchar(255),
                         name varchar(255),
                         address varchar(255),
                         city varchar(255),
                         zipcode varchar(10),
                         state varchar(30),
                         creation datetime
);
create table reservation(
                            ReservationID int auto_increment primary key,
                            startDate date,
                            endDate date,
                            lodge varchar(255),
                            guests int,
                            customerID int,
                            creation datetime,
                            foreign key (customerID) references customer(customerID)
);


insert into customer (email, password, name, creation, address,city,zipcode,state) values
                                                                                  ('test@test.com', 'apassword', 'Tester', now(), '309 Some Road', '33333','Acity','SC'),
                                                                                  ('anotherTester@test.com', 'somePassword', 'TestGuy', now(),'111 East Road','testCity', '11111', 'NC'),
                                                                                  ('justatest@test.com', 'thatsapass', 'Steven Jobs',now() ,'156 West Road','SomeCity', '30888', 'MA');

insert into reservation (startDate, endDate, lodge, guests, customerID, creation) values
                                                                                      ('2025-06-22','2025-06-23', 'queen', 5, 1, '2024-8-24 05:02:03'),
                                                                                      ('2025-01-11', '2025-01-11', 'king', 2, 1, '2024-8-22 14:06:56'),
                                                                                      ('2025-03-15', '2025-03-16','Double Full', 3, 1, '2024-8-23 19:58:00');