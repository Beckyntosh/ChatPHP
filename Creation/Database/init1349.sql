CREATE TABLE IF NOT EXISTS Quizzes (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(30) NOT NULL,
reg_date TIMESTAMP);

CREATE TABLE IF NOT EXISTS Questions (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
quiz_id INT(6) UNSIGNED,
question_text TEXT NOT NULL,
FOREIGN KEY (quiz_id) REFERENCES Quizzes(id) ON DELETE CASCADE);

CREATE TABLE IF NOT EXISTS Options (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
question_id INT(6) UNSIGNED,
option_text VARCHAR(100) NOT NULL,
is_correct BOOLEAN,
FOREIGN KEY (question_id) REFERENCES Questions(id) ON DELETE CASCADE);

INSERT INTO Quizzes (title) VALUES ('World Capitals');
INSERT INTO Quizzes (title) VALUES ('Mathematics');
INSERT INTO Quizzes (title) VALUES ('Science');
INSERT INTO Quizzes (title) VALUES ('History');
INSERT INTO Quizzes (title) VALUES ('Geography');
INSERT INTO Quizzes (title) VALUES ('Literature');
INSERT INTO Quizzes (title) VALUES ('Music');
INSERT INTO Quizzes (title) VALUES ('Languages');
INSERT INTO Quizzes (title) VALUES ('Sports');
INSERT INTO Quizzes (title) VALUES ('Movies');
