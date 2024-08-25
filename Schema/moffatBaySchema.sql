drop database if exists moffatbay;
create database moffatbay;
use moffatbay;

create table customer(
                         customerID int auto_increment primary key,
                         email varchar(254),
                         password varchar(255),
                         name varchar(255),
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


insert into customer (email, password, name, creation) values
                                                 ('test@test.com', 'apassword', 'Tester', '2024-08-10 08:10:53'),
                                                 ('anotherTester@test.com', 'somePassword', 'TestGuy', '2024-08-15 08:15:56'),
                                                 ('justatest@test.com', 'thatsapass', 'Steven Jobs', '2024-08-16 10:50:16');

insert into reservation (startDate, endDate, lodge, guests, customerID, creation) values
                                                                                      ('2025-06-22','2025-06-23', 'queen', 5, 1, '2024-8-24 05:02:03'),
                                                                                      ('2025-01-11', '2025-01-11', 'king', 2, 2, '2024-8-22 14:06:56'),
                                                                                      ('2025-03-15', '2025-03-16','Double Full', 3, 3, '2024-8-23 19:58:00');
select * from customer;
select * from reservation;