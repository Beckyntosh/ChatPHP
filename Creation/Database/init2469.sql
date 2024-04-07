CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(60) NOT NULL,
reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS appointments (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
userid INT(6) UNSIGNED,
appointment_date DATETIME NOT NULL,
FOREIGN KEY (userid) REFERENCES users(id)
);

INSERT INTO users (username, password) VALUES ('user1', 'password1'),
('user2', 'password2'),
('user3', 'password3'),
('user4', 'password4'),
('user5', 'password5'),
('user6', 'password6'),
('user7', 'password7'),
('user8', 'password8'),
('user9', 'password9'),
('user10', 'password10');

INSERT INTO appointments (userid, appointment_date) VALUES (1, '2023-05-10 10:00:00'),
(2, '2023-05-11 11:00:00'),
(3, '2023-05-12 12:00:00'),
(4, '2023-05-13 13:00:00'),
(5, '2023-05-14 14:00:00'),
(6, '2023-05-15 15:00:00'),
(7, '2023-05-16 16:00:00'),
(8, '2023-05-17 17:00:00'),
(9, '2023-05-18 18:00:00'),
(10, '2023-05-19 19:00:00');
