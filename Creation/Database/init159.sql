CREATE TABLE IF NOT EXISTS language_modules (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS module_quizzes (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    module_id INT(6) UNSIGNED,
    question TEXT NOT NULL,
    answer TEXT NOT NULL,
    FOREIGN KEY (module_id) REFERENCES language_modules(id) ON DELETE CASCADE
);

INSERT INTO language_modules (title, description) VALUES ('Module 1', 'Description for Module 1');
INSERT INTO language_modules (title, description) VALUES ('Module 2', 'Description for Module 2');
INSERT INTO language_modules (title, description) VALUES ('Module 3', 'Description for Module 3');
INSERT INTO language_modules (title, description) VALUES ('Module 4', 'Description for Module 4');
INSERT INTO language_modules (title, description) VALUES ('Module 5', 'Description for Module 5');
INSERT INTO language_modules (title, description) VALUES ('Module 6', 'Description for Module 6');
INSERT INTO language_modules (title, description) VALUES ('Module 7', 'Description for Module 7');
INSERT INTO language_modules (title, description) VALUES ('Module 8', 'Description for Module 8');
INSERT INTO language_modules (title, description) VALUES ('Module 9', 'Description for Module 9');
INSERT INTO language_modules (title, description) VALUES ('Module 10', 'Description for Module 10');

INSERT INTO module_quizzes (module_id, question, answer) VALUES (1, 'Question 1 for Module 1', 'Answer 1 for Question 1');
INSERT INTO module_quizzes (module_id, question, answer) VALUES (1, 'Question 2 for Module 1', 'Answer 2 for Question 2');
INSERT INTO module_quizzes (module_id, question, answer) VALUES (2, 'Question 1 for Module 2', 'Answer 1 for Question 1');
INSERT INTO module_quizzes (module_id, question, answer) VALUES (2, 'Question 2 for Module 2', 'Answer 2 for Question 2');
INSERT INTO module_quizzes (module_id, question, answer) VALUES (3, 'Question 1 for Module 3', 'Answer 1 for Question 1');
INSERT INTO module_quizzes (module_id, question, answer) VALUES (3, 'Question 2 for Module 3', 'Answer 2 for Question 2');
INSERT INTO module_quizzes (module_id, question, answer) VALUES (4, 'Question 1 for Module 4', 'Answer 1 for Question 1');
INSERT INTO module_quizzes (module_id, question, answer) VALUES (4, 'Question 2 for Module 4', 'Answer 2 for Question 2');
INSERT INTO module_quizzes (module_id, question, answer) VALUES (5, 'Question 1 for Module 5', 'Answer 1 for Question 1');
INSERT INTO module_quizzes (module_id, question, answer) VALUES (5, 'Question 2 for Module 5', 'Answer 2 for Question 2');
