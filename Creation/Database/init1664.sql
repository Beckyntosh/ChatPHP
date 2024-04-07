CREATE TABLE IF NOT EXISTS courses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255) NOT NULL,
category VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS learning_paths (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255) NOT NULL,
courses_id TEXT NOT NULL
);

INSERT INTO courses (title, category) VALUES ('Introduction to Data Science', 'Data Science');
INSERT INTO courses (title, category) VALUES ('Machine Learning Fundamentals', 'Data Science');
INSERT INTO courses (title, category) VALUES ('Data Visualization Techniques', 'Data Science');
INSERT INTO courses (title, category) VALUES ('Big Data Analytics', 'Data Science');
INSERT INTO courses (title, category) VALUES ('Statistical Analysis', 'Data Science');
INSERT INTO courses (title, category) VALUES ('Python Programming for Data Science', 'Data Science');
INSERT INTO courses (title, category) VALUES ('R Programming for Data Science', 'Data Science');
INSERT INTO courses (title, category) VALUES ('Data Mining Methods', 'Data Science');
INSERT INTO courses (title, category) VALUES ('Deep Learning Concepts', 'Data Science');
INSERT INTO courses (title, category) VALUES ('Advanced Data Science Projects', 'Data Science');
