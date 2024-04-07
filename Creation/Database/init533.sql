CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(255) NOT NULL,
reset_token VARCHAR(255),
reset_expiry DATETIME,
reg_date TIMESTAMP
);

INSERT INTO users (username, email, password, reg_date) VALUES 
('JohnDoe', 'johndoe@example.com', 'password123', NOW()),
('JaneSmith', 'janesmith@example.com', 'securepass', NOW()),
('AliceJohnson', 'alicejohnson@example.com', 'mypassword', NOW()),
('BobBrown', 'bobbrown@example.com', 'letmein', NOW()),
('EvaDavis', 'evadavis@example.com', 'p@ssw0rd', NOW()),
('MichaelLee', 'michaellee@example.com', 'secretpass', NOW()),
('SarahClark', 'sarahclark@example.com', 'pass1234', NOW()),
('DavidWilson', 'davidwilson@example.com', 'password@123', NOW()),
('EmilyYoung', 'emilyyoung@example.com', 'mysecurepass', NOW()),
('KevinMiller', 'kevinmiller@example.com', 'kevin123', NOW());
