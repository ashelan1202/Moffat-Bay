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
create table rooms(
                      roomId int auto_increment primary key,
                      roomSize varchar(15),
                      price decimal(10,2)
);
create table reservation(
                            ReservationID int auto_increment primary key,
                            startDate date,
                            endDate date,
                            roomId int,
                            guests int,
                            totalPrice decimal(10,2),
                            customerID int,
                            creation datetime,
                            foreign key (customerID) references customer(customerID),
                            foreign key (roomId) references rooms(roomId)
);



insert into customer (email, password, name, creation, address,city,zipcode,state) values
                                                                                  ('test@test.com', '$2y$10$gddaYyFfHSkqwwsxxGbm/Oe1SehSPsjj5P7hDWN5EZeV6yhf5Gfle', 'Tester', now(), '309 Some Road', '33333','Acity','SC'),
                                                                                  ('anotherTester@test.com', '$2y$10$uF4AHhIpY141WJtlGzOkXOB02pXF5nOhPgiR.A4iOMsOtR.icVYy.', 'TestGuy', now(),'111 East Road','testCity', '11111', 'NC'),
                                                                                  ('justatest@test.com', '$2y$10$LB37TByyJGEBY8awsu2sy.zUa/hux9QhX5boJ9j1zOqU53hHwzGY6', 'Steven Jobs',now() ,'156 West Road','SomeCity', '30888', 'MA');
insert into rooms(roomSize, price) values
                                    ('Double Full', 155),
                                    ('King', 155),
                                    ('Queen', 130),
                                    ('Double Queen', 145);

insert into reservation (startDate, endDate, roomId, guests,totalPrice, customerID, creation) values
                                                                                      ('2025-06-22','2025-06-23', 3, 5, 130, 1,'2024-8-24 05:02:03'),
                                                                                      ('2025-01-11', '2025-01-12', 2, 2, 155, 2,'2024-8-22 14:06:56'),
                                                                                      ('2025-03-15', '2025-03-16',1, 3, 115,3, '2024-8-23 19:58:00');