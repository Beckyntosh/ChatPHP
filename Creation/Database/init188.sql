CREATE TABLE IF NOT EXISTS Courses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
title VARCHAR(255) NOT NULL,
description TEXT,
CONSTRAINT title_unique UNIQUE (title)
);

CREATE TABLE IF NOT EXISTS UserCourses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
userId INT(6) UNSIGNED,
courseId INT(6) UNSIGNED,
FOREIGN KEY (courseId) REFERENCES Courses(id),
UNIQUE KEY (userId, courseId)
);

INSERT INTO Courses (title, description) VALUES ('Mathematics 101', 'Introduction to basic math principles');
INSERT INTO Courses (title, description) VALUES ('History 202', 'Exploring the significant events of the past');
INSERT INTO Courses (title, description) VALUES ('Programming Fundamentals', 'Understanding basic coding concepts');
INSERT INTO Courses (title, description) VALUES ('Literature Appreciation', 'Exploring classic and modern literary works');
INSERT INTO Courses (title, description) VALUES ('Chemistry Basics', 'Fundamental principles of chemistry');
INSERT INTO Courses (title, description) VALUES ('Art History', 'Exploring the evolution of art through the ages');
INSERT INTO Courses (title, description) VALUES ('Introduction to Psychology', 'Understanding the basics of human behavior');
INSERT INTO Courses (title, description) VALUES ('Earth Science', 'Exploring the science of the Earth and its processes');
INSERT INTO Courses (title, description) VALUES ('Music Theory', 'Understanding the principles of music composition');
INSERT INTO Courses (title, description) VALUES ('Introduction to Economics', 'Exploring basic economic concepts');