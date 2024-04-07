CREATE TABLE IF NOT EXISTS courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(50) NOT NULL,
    grade VARCHAR(1) NOT NULL,
    credits INT NOT NULL
);

INSERT INTO courses (course_name, grade, credits) VALUES ('Course 1', 'A', 3);
INSERT INTO courses (course_name, grade, credits) VALUES ('Course 2', 'B', 4);
INSERT INTO courses (course_name, grade, credits) VALUES ('Course 3', 'C', 3);
INSERT INTO courses (course_name, grade, credits) VALUES ('Course 4', 'B', 4);
INSERT INTO courses (course_name, grade, credits) VALUES ('Course 5', 'A', 3);
INSERT INTO courses (course_name, grade, credits) VALUES ('Course 6', 'C', 3);
INSERT INTO courses (course_name, grade, credits) VALUES ('Course 7', 'A', 4);
INSERT INTO courses (course_name, grade, credits) VALUES ('Course 8', 'D', 2);
INSERT INTO courses (course_name, grade, credits) VALUES ('Course 9', 'B', 3);
INSERT INTO courses (course_name, grade, credits) VALUES ('Course 10', 'A', 4);
