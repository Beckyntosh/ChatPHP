CREATE TABLE IF NOT EXISTS courses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255) NOT NULL,
duration INT(3),
difficulty VARCHAR(50),
instructor_rating FLOAT,
reg_date TIMESTAMP
);

INSERT INTO courses (title, duration, difficulty, instructor_rating, reg_date) VALUES ('Course 1', 10, 'Intermediate', 4.2, '2022-01-01 10:00:00');
INSERT INTO courses (title, duration, difficulty, instructor_rating, reg_date) VALUES ('Course 2', 5, 'Beginner', 3.8, '2022-01-15 09:30:00');
INSERT INTO courses (title, duration, difficulty, instructor_rating, reg_date) VALUES ('Course 3', 8, 'Advanced', 4.5, '2022-02-03 14:45:00');
INSERT INTO courses (title, duration, difficulty, instructor_rating, reg_date) VALUES ('Course 4', 12, 'Intermediate', 4.0, '2022-02-12 11:20:00');
INSERT INTO courses (title, duration, difficulty, instructor_rating, reg_date) VALUES ('Course 5', 6, 'Beginner', 3.5, '2022-03-05 13:10:00');
INSERT INTO courses (title, duration, difficulty, instructor_rating, reg_date) VALUES ('Course 6', 9, 'Advanced', 4.8, '2022-03-21 08:00:00');
INSERT INTO courses (title, duration, difficulty, instructor_rating, reg_date) VALUES ('Course 7', 7, 'Intermediate', 4.1, '2022-04-09 10:30:00');
INSERT INTO courses (title, duration, difficulty, instructor_rating, reg_date) VALUES ('Course 8', 11, 'Beginner', 3.7, '2022-04-18 15:45:00');
INSERT INTO courses (title, duration, difficulty, instructor_rating, reg_date) VALUES ('Course 9', 4, 'Advanced', 4.3, '2022-05-01 07:20:00');
INSERT INTO courses (title, duration, difficulty, instructor_rating, reg_date) VALUES ('Course 10', 13, 'Intermediate', 4.4, '2022-05-22 09:00:00');
