

create table user(
	userId int AUTO_INCREMENT PRIMARY KEY,
    userName varchar(45) unique,
    name varchar(45),
    password varchar(45),
    email varchar(45)   
);


create table staff(
	sid int AUTO_INCREMENT PRIMARY KEY,
    staffUserName varchar(45) unique,
    name varchar(45),
    position varchar(45)   
);

create table apartment(
	aid int AUTO_INCREMENT PRIMARY KEY,
    name varchar(45),
    address varchar(45),
    availableHomes int,
    userId int,

    foreign key (userId) REFERENCES user(userId) 
);

create table userComplaint(
    cid int AUTO_INCREMENT PRIMARY KEY,
    userId int ,
    complaint varchar(45),

    foreign key (userId) references user(userId)

);

create table booking(
    bookingId  int AUTO_INCREMENT primary key,
    userId int,
    aid int,

    foreign key (userId) references user(userId)
);


INSERT INTO user (userName, name, password, email) 
VALUES 
('sanjeewa23', 'Sanjeewa Perera', 'password123', 'sanjeewa@gmail.com'),
('nirmal45', 'Nirmal Silva', 'nirmalPass', 'nirmal@yahoo.com'),
('kasun78', 'Kasun Rathnayake', 'kasunPass456', 'kasun@hotmail.com'),
('chathurika99', 'Chathurika Herath', 'chatPass789', 'chathurika@outlook.com'),
('anuradha56', 'Anuradha Kumara', 'anuPass12', 'anuradha@gmail.com');

INSERT INTO staff (staffUserName, name, position) 
VALUES 
('madura90', 'Madura Abeysekara', 'Manager'),
('priyal89', 'Priyal Jayasinghe', 'Sales Agent'),
('tharaka77', 'Tharaka Dissanayake', 'Security'),
('dinuka65', 'Dinuka Fernando', 'Accountant'),
('shyama88', 'Shyama Wickramasinghe', 'Marketing Executive');


INSERT INTO apartment (name, address, availableHomes, userId) 
VALUES 
('Skyline Apartments', 'Colombo 03', 5, 1),
('Lotus Residencies', 'Nugegoda', 3, 2),
('Cinnamon Heights', 'Kandy', 7, 3),
('Galle Fort View', 'Galle', 4, 4),
('Ocean Breeze Apartments', 'Mount Lavinia', 6, 5);


INSERT INTO userComplaint (userId, complaint) 
VALUES 
(1, 'Water leakage issue'),
(2, 'Noisy neighbors'),
(3, 'Elevator malfunctioning'),
(4, 'Power outage'),
(5, 'Security concerns');


INSERT INTO booking (userId, aid) 
VALUES 
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);
