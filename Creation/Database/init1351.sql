CREATE TABLE IF NOT EXISTS quizzes (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS questions (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    quiz_id INT(6) UNSIGNED,
    question_text VARCHAR(255) NOT NULL,
    correct_answer VARCHAR(100) NOT NULL,
    FOREIGN KEY (quiz_id) REFERENCES quizzes(id);
    
INSERT INTO quizzes (title) VALUES ('World Capitals');
INSERT INTO quizzes (title) VALUES ('Science Trivia');
INSERT INTO quizzes (title) VALUES ('Movie Quotes');
INSERT INTO quizzes (title) VALUES ('Animal Kingdom');
INSERT INTO quizzes (title) VALUES ('History Buffs');
INSERT INTO quizzes (title) VALUES ('Famous Artists');
INSERT INTO quizzes (title) VALUES ('Literary Classics');
INSERT INTO quizzes (title) VALUES ('Music Legends');
INSERT INTO quizzes (title) VALUES ('Foodie Fun');
INSERT INTO quizzes (title) VALUES ('Sports Fans');