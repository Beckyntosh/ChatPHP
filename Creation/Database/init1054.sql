CREATE TABLE IF NOT EXISTS courses (
id INT AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255) NOT NULL,
description TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS ratings (
id INT AUTO_INCREMENT PRIMARY KEY,
course_id INT,
rating INT,
comment TEXT,
FOREIGN KEY (course_id) REFERENCES courses(id)
);

INSERT INTO courses (title, description) VALUES ('Introduction to Programming', 'Learn the basics of programming languages');
INSERT INTO courses (title, description) VALUES ('Data Analysis with Python', 'Master data analysis techniques using Python');
INSERT INTO courses (title, description) VALUES ('Web Development Fundamentals', 'Get started with web development');
INSERT INTO courses (title, description) VALUES ('Machine Learning Essentials', 'Explore the world of machine learning');
INSERT INTO courses (title, description) VALUES ('Digital Marketing Strategies', 'Learn effective digital marketing strategies');
INSERT INTO courses (title, description) VALUES ('Graphic Design Principles', 'Understanding the basics of graphic design');
INSERT INTO courses (title, description) VALUES ('Financial Management Basics', 'Essential financial management concepts');
INSERT INTO courses (title, description) VALUES ('Art History Overview', 'Discover the history of art through the ages');
INSERT INTO courses (title, description) VALUES ('Photography Techniques', 'Improve your photography skills');
INSERT INTO courses (title, description) VALUES ('Introduction to Psychology', 'Explore the fundamentals of psychology');