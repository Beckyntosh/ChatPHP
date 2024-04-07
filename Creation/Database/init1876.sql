CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
username VARCHAR(30) NOT NULL, 
email VARCHAR(50) NOT NULL,
password VARCHAR(255) NOT NULL,
reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS event_registration (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
user_id INT(6) UNSIGNED,
event_name VARCHAR(50) NOT NULL,
register_date TIMESTAMP,
FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (username, email, password) VALUES ('JohnDoe', 'johndoe@example.com', 'password123');
INSERT INTO users (username, email, password) VALUES ('JaneSmith', 'janesmith@example.com', 'password456');
INSERT INTO users (username, email, password) VALUES ('AliceBrown', 'alicebrown@example.com', 'password789');
INSERT INTO users (username, email, password) VALUES ('CharlieGreen', 'charliegreen@example.com', 'passwordabc');
INSERT INTO users (username, email, password) VALUES ('SarahJones', 'sarahjones@example.com', 'passworddef');
INSERT INTO users (username, email, password) VALUES ('MikeTaylor', 'miketaylor@example.com', 'passwordghi');
INSERT INTO users (username, email, password) VALUES ('EmilyWhite', 'emilywhite@example.com', 'passwordjkl');
INSERT INTO users (username, email, password) VALUES ('KevinBlack', 'kevinblack@example.com', 'passwordmno');
INSERT INTO users (username, email, password) VALUES ('LauraDavis', 'lauradavis@example.com', 'passwordpqr');
INSERT INTO users (username, email, password) VALUES ('PeterWilson', 'peterwilson@example.com', 'passwordstu');

INSERT INTO event_registration (user_id, event_name) VALUES (1, 'Webinar A');
INSERT INTO event_registration (user_id, event_name) VALUES (2, 'Conference X');
INSERT INTO event_registration (user_id, event_name) VALUES (3, 'Workshop Y');
INSERT INTO event_registration (user_id, event_name) VALUES (4, 'Seminar Z');
INSERT INTO event_registration (user_id, event_name) VALUES (5, 'Training Session 1');
INSERT INTO event_registration (user_id, event_name) VALUES (6, 'Discussion Forum Beta');
INSERT INTO event_registration (user_id, event_name) VALUES (7, 'Product Launch Event');
INSERT INTO event_registration (user_id, event_name) VALUES (8, 'Networking Mixer');
INSERT INTO event_registration (user_id, event_name) VALUES (9, 'Panel Discussion');
INSERT INTO event_registration (user_id, event_name) VALUES (10, 'Career Fair');
