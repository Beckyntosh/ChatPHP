CREATE TABLE IF NOT EXISTS Users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
role VARCHAR(10)
);

CREATE TABLE IF NOT EXISTS Products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
productname VARCHAR(50), 
description TEXT, 
price DECIMAL(8,2)
);

INSERT INTO Users (username, password, role) VALUES 
('JohnDoe', 'password1', 'admin'),
('JaneDoe', 'password2', 'user'),
('AliceSmith', 'password3', 'user'),
('BobJohnson', 'password4', 'admin'),
('SarahBrown', 'password5', 'user'),
('MikeDavis', 'password6', 'user'),
('EmilyWilson', 'password7', 'user'),
('MarkRobinson', 'password8', 'admin'),
('LauraLee', 'password9', 'user'),
('ChrisEvans', 'password10', 'user');
