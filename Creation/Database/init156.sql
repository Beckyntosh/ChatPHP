CREATE TABLE IF NOT EXISTS modules (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS quizzes (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    module_id INT(6) UNSIGNED,
    question TEXT NOT NULL,
    answer VARCHAR(255) NOT NULL,
    FOREIGN KEY (module_id) REFERENCES modules(id),
    reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS vocabularies (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    module_id INT(6) UNSIGNED,
    term VARCHAR(100) NOT NULL,
    definition TEXT NOT NULL,
    FOREIGN KEY (module_id) REFERENCES modules(id),
    reg_date TIMESTAMP
);

INSERT INTO modules (title, description) VALUES ('Module 1', 'Description for Module 1');
INSERT INTO modules (title, description) VALUES ('Module 2', 'Description for Module 2');
INSERT INTO modules (title, description) VALUES ('Module 3', 'Description for Module 3');
INSERT INTO modules (title, description) VALUES ('Module 4', 'Description for Module 4');
INSERT INTO modules (title, description) VALUES ('Module 5', 'Description for Module 5');

INSERT INTO quizzes (module_id, question, answer) VALUES (1, 'What is 1+1?', '2');
INSERT INTO quizzes (module_id, question, answer) VALUES (2, 'What is the capital of France?', 'Paris');
INSERT INTO quizzes (module_id, question, answer) VALUES (3, 'Who wrote Romeo and Juliet?', 'William Shakespeare');
INSERT INTO quizzes (module_id, question, answer) VALUES (4, 'What year did World War II end?', '1945');
INSERT INTO quizzes (module_id, question, answer) VALUES (5, 'What is the chemical symbol for gold?', 'Au');

INSERT INTO vocabularies (module_id, term, definition) VALUES (1, 'Apple', 'A fruit that grows on trees');
INSERT INTO vocabularies (module_id, term, definition) VALUES (2, 'Bonjour', 'Hello in French');
INSERT INTO vocabularies (module_id, term, definition) VALUES (3, 'Photosynthesis', 'Process by which plants make food');
INSERT INTO vocabularies (module_id, term, definition) VALUES (4, 'Gravity', 'Force that attracts objects towards each other');
INSERT INTO vocabularies (module_id, term, definition) VALUES (5, 'Photosynthesis', 'Process by which plants make food');
