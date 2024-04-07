CREATE TABLE IF NOT EXISTS courses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
course_name VARCHAR(255) NOT NULL,
category VARCHAR(50) NOT NULL,
reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS user_courses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
course_id INT(6) UNSIGNED,
FOREIGN KEY (course_id) REFERENCES courses(id),
reg_date TIMESTAMP
);

INSERT INTO courses (course_name, category) VALUES ('Data Science Basics', 'Data Science');
INSERT INTO courses (course_name, category) VALUES ('Advanced Data Analysis', 'Data Science');
INSERT INTO courses (course_name, category) VALUES ('Machine Learning Fundamentals', 'Data Science');
INSERT INTO courses (course_name, category) VALUES ('Big Data Technologies', 'Data Science');
INSERT INTO courses (course_name, category) VALUES ('Data Visualization Techniques', 'Data Science');
INSERT INTO courses (course_name, category) VALUES ('Data Mining Algorithms', 'Data Science');
INSERT INTO courses (course_name, category) VALUES ('Python for Data Science', 'Data Science');
INSERT INTO courses (course_name, category) VALUES ('Data Science Capstone Project', 'Data Science');
INSERT INTO courses (course_name, category) VALUES ('Deep Learning Concepts', 'Data Science');
INSERT INTO courses (course_name, category) VALUES ('Statistical Analysis Methods', 'Data Science');
