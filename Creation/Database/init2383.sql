CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS courses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
userid INT(6) UNSIGNED,
course_name VARCHAR(50) NOT NULL,
FOREIGN KEY(userid) REFERENCES users(id)
);

INSERT INTO users (username, password, email) VALUES ('john_doe', 'password123', 'john.doe@example.com');
INSERT INTO users (username, password, email) VALUES ('jane_smith', 'pass789', 'jane.smith@example.com');
INSERT INTO users (username, password, email) VALUES ('alice_wonder', 'alicepass', 'alice.wonder@example.com');
INSERT INTO users (username, password, email) VALUES ('bob_jones', 'bobjones123', 'bob.jones@example.com');
INSERT INTO users (username, password, email) VALUES ('lisa_brown', 'lisabrown456', 'lisa.brown@example.com');
INSERT INTO users (username, password, email) VALUES ('michael_hill', 'mikehill789', 'michael.hill@example.com');
INSERT INTO users (username, password, email) VALUES ('sara_park', 'saraparkpass', 'sara.park@example.com');
INSERT INTO users (username, password, email) VALUES ('chris_snow', 'snowchris', 'chris.snow@example.com');
INSERT INTO users (username, password, email) VALUES ('emily_white', 'whiteem123', 'emily.white@example.com');
INSERT INTO users (username, password, email) VALUES ('greg_tan', 'gregtanpass', 'greg.tan@example.com');