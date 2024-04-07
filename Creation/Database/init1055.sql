CREATE TABLE IF NOT EXISTS courses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
description TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS ratings (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
course_id INT(6) UNSIGNED,
rating INT(1),
comment TEXT,
FOREIGN KEY (course_id) REFERENCES courses(id)
);

INSERT INTO courses (name, description) VALUES ('Mathematics 101', 'Introductory course in mathematics');
INSERT INTO courses (name, description) VALUES ('Computer Science 201', 'Intermediate course in computer science');
INSERT INTO courses (name, description) VALUES ('History 102', 'Modern history course');
INSERT INTO courses (name, description) VALUES ('Psychology 301', 'Advanced course in psychology');
INSERT INTO courses (name, description) VALUES ('English Literature 202', 'Literature analysis course');
INSERT INTO courses (name, description) VALUES ('Biology 201', 'Study of living organisms');
INSERT INTO courses (name, description) VALUES ('Physics 301', 'Advanced physics course');
INSERT INTO courses (name, description) VALUES ('Art History 101', 'Introduction to art history');
INSERT INTO courses (name, description) VALUES ('Chemistry 202', 'Chemical reactions and structures');
INSERT INTO courses (name, description) VALUES ('Political Science 301', 'Study of politics and government');
