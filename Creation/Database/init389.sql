CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS courses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
course_name VARCHAR(50) NOT NULL,
description TEXT,
reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS enrollments (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
course_id INT(6) UNSIGNED,
FOREIGN KEY (user_id) REFERENCES users(id),
FOREIGN KEY (course_id) REFERENCES courses(id),
reg_date TIMESTAMP
);

INSERT INTO users (username, email, password) VALUES ('JohnDoe', 'johndoe@example.com', 'password1');
INSERT INTO users (username, email, password) VALUES ('JaneSmith', 'janesmith@example.com', 'password2');
INSERT INTO users (username, email, password) VALUES ('AliceJones', 'alicejones@example.com', 'password3');
INSERT INTO users (username, email, password) VALUES ('BobBrown', 'bobbrown@example.com', 'password4');
INSERT INTO users (username, email, password) VALUES ('SarahWilson', 'sarahwilson@example.com', 'password5');

INSERT INTO courses (course_name, description) VALUES ('Biology 101', 'Introduction to basic biology concepts');
INSERT INTO courses (course_name, description) VALUES ('History of Art', 'Exploration of key periods in art history');
INSERT INTO courses (course_name, description) VALUES ('Python Programming', 'Learn Python programming language');
INSERT INTO courses (course_name, description) VALUES ('Financial Management', 'Understanding financial principles');
INSERT INTO courses (course_name, description) VALUES ('Photography Basics', 'Introduction to photography techniques');

INSERT INTO enrollments (user_id, course_id) VALUES (1, 2);
INSERT INTO enrollments (user_id, course_id) VALUES (3, 1);
INSERT INTO enrollments (user_id, course_id) VALUES (2, 3);
INSERT INTO enrollments (user_id, course_id) VALUES (4, 4);
INSERT INTO enrollments (user_id, course_id) VALUES (5, 5);
