CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
email VARCHAR(50),
status ENUM('active', 'inactive') NOT NULL,
reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS loyalty_program (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
points INT(10),
FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (username, password, email, status, reg_date) VALUES ('JohnDoe', 'password1', 'johndoe@example.com', 'active', NOW()),
('JaneSmith', 'password2', 'janesmith@example.com', 'inactive', NOW()),
('BobJohnson', 'password3', 'bjohnson@example.com', 'active', NOW()),
('AliceBrown', 'password4', 'abrown@example.com', 'inactive', NOW()),
('SamWilson', 'password5', 'samwilson@example.com', 'active', NOW()),
('LindaClark', 'password6', 'lindaclark@example.com', 'active', NOW()),
('TomRoberts', 'password7', 'tomroberts@example.com', 'inactive', NOW()),
('SarahYoung', 'password8', 'sarahyoung@example.com', 'active', NOW()),
('MichaelDavis', 'password9', 'michaeldavis@example.com', 'inactive', NOW()),
('LauraMiller', 'password10', 'lauramiller@example.com', 'active', NOW());

INSERT INTO loyalty_program (user_id, points) VALUES (1, 10), (3, 15), (5, 20), (6, 5), (8, 30), (10, 25);