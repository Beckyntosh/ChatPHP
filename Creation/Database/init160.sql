CREATE TABLE IF NOT EXISTS language_modules (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS vocabulary (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    module_id INT(6) UNSIGNED,
    word VARCHAR(255) NOT NULL,
    translation VARCHAR(255) NOT NULL,
    FOREIGN KEY (module_id) REFERENCES language_modules(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS quizzes (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    module_id INT(6) UNSIGNED,
    question VARCHAR(255) NOT NULL,
    correct_answer VARCHAR(255) NOT NULL,
    incorrect_answer1 VARCHAR(255) NOT NULL,
    incorrect_answer2 VARCHAR(255),
    incorrect_answer3 VARCHAR(255),
    FOREIGN KEY (module_id) REFERENCES language_modules(id) ON DELETE CASCADE
);

INSERT INTO language_modules (title, description) VALUES
("Module 1", "Description for Module 1"),
("Module 2", "Description for Module 2"),
("Module 3", "Description for Module 3"),
("Module 4", "Description for Module 4"),
("Module 5", "Description for Module 5"),
("Module 6", "Description for Module 6"),
("Module 7", "Description for Module 7"),
("Module 8", "Description for Module 8"),
("Module 9", "Description for Module 9"),
("Module 10", "Description for Module 10");

INSERT INTO vocabulary (module_id, word, translation) VALUES
(1, "Word1", "Translation1"),
(1, "Word2", "Translation2"),
(2, "Word3", "Translation3"),
(2, "Word4", "Translation4"),
(3, "Word5", "Translation5"),
(3, "Word6", "Translation6"),
(4, "Word7", "Translation7"),
(4, "Word8", "Translation8"),
(5, "Word9", "Translation9"),
(5, "Word10", "Translation10");

INSERT INTO quizzes (module_id, question, correct_answer, incorrect_answer1, incorrect_answer2, incorrect_answer3) VALUES
(1, "Question 1", "Correct Answer 1", "Incorrect Answer 1", "Incorrect Answer 2", "Incorrect Answer 3"),
(2, "Question 2", "Correct Answer 2", "Incorrect Answer 1", "Incorrect Answer 2", "Incorrect Answer 3"),
(3, "Question 3", "Correct Answer 3", "Incorrect Answer 1", "Incorrect Answer 2", "Incorrect Answer 3"),
(4, "Question 4", "Correct Answer 4", "Incorrect Answer 1", "Incorrect Answer 2", "Incorrect Answer 3"),
(5, "Question 5", "Correct Answer 5", "Incorrect Answer 1", "Incorrect Answer 2", "Incorrect Answer 3"),
(6, "Question 6", "Correct Answer 6", "Incorrect Answer 1", "Incorrect Answer 2", "Incorrect Answer 3"),
(7, "Question 7", "Correct Answer 7", "Incorrect Answer 1", "Incorrect Answer 2", "Incorrect Answer 3"),
(8, "Question 8", "Correct Answer 8", "Incorrect Answer 1", "Incorrect Answer 2", "Incorrect Answer 3"),
(9, "Question 9", "Correct Answer 9", "Incorrect Answer 1", "Incorrect Answer 2", "Incorrect Answer 3"),
(10, "Question 10", "Correct Answer 10", "Incorrect Answer 1", "Incorrect Answer 2", "Incorrect Answer 3");
