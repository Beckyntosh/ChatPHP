CREATE TABLE users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
);

INSERT INTO users (username, password, email) VALUES ('john_doe', 'john123', 'john_doe@example.com');
INSERT INTO users (username, password, email) VALUES ('jane_smith', 'jane456', 'jane_smith@example.com');
INSERT INTO users (username, password, email) VALUES ('alice_brown', 'alice789', 'alice_brown@example.com');
INSERT INTO users (username, password, email) VALUES ('bob_miller', 'bob1011', 'bob_miller@example.com');
INSERT INTO users (username, password, email) VALUES ('sarah_white', 'sarah1213', 'sarah_white@example.com');
INSERT INTO users (username, password, email) VALUES ('michael_green', 'michael1415', 'michael_green@example.com');
INSERT INTO users (username, password, email) VALUES ('emily_blue', 'emily1617', 'emily_blue@example.com');
INSERT INTO users (username, password, email) VALUES ('david_black', 'david1819', 'david_black@example.com');
INSERT INTO users (username, password, email) VALUES ('lisa_red', 'lisa2021', 'lisa_red@example.com');
INSERT INTO users (username, password, email) VALUES ('kevin_orange', 'kevin2223', 'kevin_orange@example.com');