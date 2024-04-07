CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS appointments (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userid INT(6) UNSIGNED,
    datetime DATETIME,
    appointment_type VARCHAR(50),
    FOREIGN KEY (userid) REFERENCES users(id)
);

INSERT INTO users (username, email, password) VALUES ('JohnDoe', 'johndoe@example.com', 'password123');
INSERT INTO users (username, email, password) VALUES ('JaneSmith', 'janesmith@example.com', 'securepassword');
INSERT INTO users (username, email, password) VALUES ('BobJohnson', 'bob@example.com', 'bobpass');
INSERT INTO users (username, email, password) VALUES ('AliceBrown', 'alice@example.com', 'alicepass');
INSERT INTO users (username, email, password) VALUES ('SamGreen', 'sam@example.com', 'sampass');
INSERT INTO users (username, email, password) VALUES ('KarenWhite', 'karen@example.com', 'karenpass');
INSERT INTO users (username, email, password) VALUES ('TomWilson', 'tom@example.com', 'password123');
INSERT INTO users (username, email, password) VALUES ('EmilyJones', 'emily@example.com', 'emilypass');
INSERT INTO users (username, email, password) VALUES ('ChrisLee', 'chris@example.com', 'chrispass');
INSERT INTO users (username, email, password) VALUES ('LauraMiller', 'laura@example.com', 'laurapass');

INSERT INTO appointments (userid, datetime, appointment_type) VALUES ('1', '2022-12-01 09:00:00', 'Dental');
INSERT INTO appointments (userid, datetime, appointment_type) VALUES ('2', '2022-12-03 10:30:00', 'Dental');
INSERT INTO appointments (userid, datetime, appointment_type) VALUES ('3', '2022-12-05 11:00:00', 'Dental');
INSERT INTO appointments (userid, datetime, appointment_type) VALUES ('4', '2022-12-07 14:00:00', 'Dental');
INSERT INTO appointments (userid, datetime, appointment_type) VALUES ('5', '2022-12-09 15:30:00', 'Dental');
INSERT INTO appointments (userid, datetime, appointment_type) VALUES ('6', '2022-12-11 16:00:00', 'Dental');
INSERT INTO appointments (userid, datetime, appointment_type) VALUES ('7', '2022-12-13 10:00:00', 'Dental');
INSERT INTO appointments (userid, datetime, appointment_type) VALUES ('8', '2022-12-15 13:30:00', 'Dental');
INSERT INTO appointments (userid, datetime, appointment_type) VALUES ('9', '2022-12-17 08:30:00', 'Dental');
INSERT INTO appointments (userid, datetime, appointment_type) VALUES ('10', '2022-12-19 12:00:00', 'Dental');