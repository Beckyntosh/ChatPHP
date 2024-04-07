CREATE TABLE IF NOT EXISTS courses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(50) NOT NULL,
description TEXT,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS user_paths (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
course_id INT(6) UNSIGNED,
FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE
);

INSERT INTO courses (title, description) VALUES ('Photography Basics', 'Introduction to the fundamentals of photography');
INSERT INTO courses (title, description) VALUES ('Portrait Photography', 'Learn how to capture beautiful portraits');
INSERT INTO courses (title, description) VALUES ('Landscape Photography', 'Discover the art of capturing landscapes');
INSERT INTO courses (title, description) VALUES ('Lighting Techniques', 'Master the use of light in photography');
INSERT INTO courses (title, description) VALUES ('Post-Processing', 'Enhance your photos with editing tools');
INSERT INTO courses (title, description) VALUES ('Composition Principles', 'Understand the rules of composition');
INSERT INTO courses (title, description) VALUES ('Wedding Photography', 'Capture memorable moments at weddings');
INSERT INTO courses (title, description) VALUES ('Street Photography', 'Explore the urban environment through photography');
INSERT INTO courses (title, description) VALUES ('Wildlife Photography', 'Capture stunning wildlife shots');
INSERT INTO courses (title, description) VALUES ('Fashion Photography', 'Create glamorous fashion images');