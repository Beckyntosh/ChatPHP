CREATE TABLE learning_path (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    path_name VARCHAR(30) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Create course table
CREATE TABLE course (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    path_id INT(6) UNSIGNED,
    course_name VARCHAR(50),
    description TEXT,
    FOREIGN KEY (path_id) REFERENCES learning_path(id)
);

-- Insert at least 10 values into the tables
INSERT INTO learning_path (path_name, description) VALUES ('Data Science Path 1', 'Description 1');
INSERT INTO learning_path (path_name, description) VALUES ('Data Science Path 2', 'Description 2');
INSERT INTO learning_path (path_name, description) VALUES ('Data Science Path 3', 'Description 3');

INSERT INTO course (path_id, course_name, description) VALUES (1, 'Intro to Data Science', 'Course Description 1');
INSERT INTO course (path_id, course_name, description) VALUES (1, 'Data Analysis with Python', 'Course Description 2');
INSERT INTO course (path_id, course_name, description) VALUES (2, 'Machine Learning Fundamentals', 'Course Description 3');
INSERT INTO course (path_id, course_name, description) VALUES (2, 'Data Visualization Techniques', 'Course Description 4');
INSERT INTO course (path_id, course_name, description) VALUES (3, 'Deep Learning Basics', 'Course Description 5');
INSERT INTO course (path_id, course_name, description) VALUES (3, 'Big Data Analytics', 'Course Description 6');
INSERT INTO course (path_id, course_name, description) VALUES (3, 'AI Ethics', 'Course Description 7');
