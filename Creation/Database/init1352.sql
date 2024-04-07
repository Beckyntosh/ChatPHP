CREATE TABLE IF NOT EXISTS quizzes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS questions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    quiz_id INT NOT NULL,
    question VARCHAR(255) NOT NULL,
    answer VARCHAR(255) NOT NULL,
    FOREIGN KEY (quiz_id) REFERENCES quizzes(id)
);

INSERT INTO quizzes (title) VALUES ('World Capitals');
INSERT INTO quizzes (title) VALUES ('Mathematics');
INSERT INTO quizzes (title) VALUES ('History');
INSERT INTO quizzes (title) VALUES ('Science');
INSERT INTO quizzes (title) VALUES ('Literature');
INSERT INTO quizzes (title) VALUES ('Geography');
INSERT INTO quizzes (title) VALUES ('Art');
INSERT INTO quizzes (title) VALUES ('Music');
INSERT INTO quizzes (title) VALUES ('Sports');
INSERT INTO quizzes (title) VALUES ('Movies');
