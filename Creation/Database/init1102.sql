
CREATE TABLE IF NOT EXISTS student_grades (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(50) NOT NULL,
    credits INT(3) NOT NULL,
    grade DECIMAL(3,2) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO student_grades (course_name, credits, grade) VALUES ('Mathematics', 3, 3.5);
INSERT INTO student_grades (course_name, credits, grade) VALUES ('Physics', 4, 3.7);
INSERT INTO student_grades (course_name, credits, grade) VALUES ('Chemistry', 3, 3.2);
INSERT INTO student_grades (course_name, credits, grade) VALUES ('Biology', 3, 3.6);
INSERT INTO student_grades (course_name, credits, grade) VALUES ('History', 3, 3.8);
INSERT INTO student_grades (course_name, credits, grade) VALUES ('English', 4, 3.9);
INSERT INTO student_grades (course_name, credits, grade) VALUES ('Computer Science', 3, 3.4);
INSERT INTO student_grades (course_name, credits, grade) VALUES ('Economics', 3, 3.1);
INSERT INTO student_grades (course_name, credits, grade) VALUES ('Art', 2, 3.5);
INSERT INTO student_grades (course_name, credits, grade) VALUES ('Geography', 2, 3.3);