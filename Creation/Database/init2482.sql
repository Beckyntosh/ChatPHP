CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS appointments (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
userid INT(6) UNSIGNED,
datetime DATETIME NOT NULL,
service VARCHAR(50) NOT NULL,
FOREIGN KEY (userid) REFERENCES users(id)
);

INSERT INTO users (username, password, email) VALUES ('JohnDoe', 'password123', 'john.doe@example.com');
INSERT INTO users (username, password, email) VALUES ('JaneSmith', 'qwerty456', 'jane.smith@example.com');
INSERT INTO users (username, password, email) VALUES ('AliceJones', 'pass123', 'alice.jones@example.com');
INSERT INTO users (username, password, email) VALUES ('BobBrown', 'brownie789', 'bob.brown@example.com');
INSERT INTO users (username, password, email) VALUES ('EvaWhite', 'evawhite123', 'eva.white@example.com');
INSERT INTO users (username, password, email) VALUES ('MaxTaylor', 'maxtaylor456', 'max.taylor@example.com');
INSERT INTO users (username, password, email) VALUES ('OliviaClark', 'olivia789', 'olivia.clark@example.com');
INSERT INTO users (username, password, email) VALUES ('SamAdams', 'sammy456', 'sam.adams@example.com');
INSERT INTO users (username, password, email) VALUES ('GraceLee', 'grace123', 'grace.lee@example.com');
INSERT INTO users (username, password, email) VALUES ('TomWilson', 'tomwilson456', 'tom.wilson@example.com');

INSERT INTO appointments (userid, datetime, service) VALUES (1, '2022-08-10 09:00:00', 'Dental');
INSERT INTO appointments (userid, datetime, service) VALUES (2, '2022-08-11 14:30:00', 'Beauty Treatment');
INSERT INTO appointments (userid, datetime, service) VALUES (3, '2022-08-12 10:45:00', 'Hair Salon');
INSERT INTO appointments (userid, datetime, service) VALUES (4, '2022-08-13 11:15:00', 'Dental');
INSERT INTO appointments (userid, datetime, service) VALUES (5, '2022-08-14 15:00:00', 'Beauty Treatment');
INSERT INTO appointments (userid, datetime, service) VALUES (6, '2022-08-15 16:30:00', 'Hair Salon');
INSERT INTO appointments (userid, datetime, service) VALUES (7, '2022-08-16 12:00:00', 'Dental');
INSERT INTO appointments (userid, datetime, service) VALUES (8, '2022-08-17 17:45:00', 'Beauty Treatment');
INSERT INTO appointments (userid, datetime, service) VALUES (9, '2022-08-18 09:30:00', 'Hair Salon');
INSERT INTO appointments (userid, datetime, service) VALUES (10, '2022-08-19 13:45:00', 'Dental');