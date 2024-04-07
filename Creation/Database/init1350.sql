CREATE TABLE IF NOT EXISTS quizzes (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(30) NOT NULL,
creator VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS questions (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
quiz_id INT(6) UNSIGNED,
question_text VARCHAR(255) NOT NULL,
FOREIGN KEY (quiz_id) REFERENCES quizzes(id)
);

CREATE TABLE IF NOT EXISTS answers (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
question_id INT(6) UNSIGNED,
answer_text VARCHAR(255) NOT NULL,
is_correct BOOLEAN,
FOREIGN KEY (question_id) REFERENCES questions(id)
);

INSERT INTO quizzes (title, creator) VALUES ('World Capitals', 'John Doe');
INSERT INTO quizzes (title, creator) VALUES ('Chemistry Basics', 'Jane Smith');
INSERT INTO quizzes (title, creator) VALUES ('Math Challenge', 'Alice Johnson');
INSERT INTO quizzes (title, creator) VALUES ('Literature Classics', 'Bob Brown');
INSERT INTO quizzes (title, creator) VALUES ('History Facts', 'Emily White');
INSERT INTO quizzes (title, creator) VALUES ('Science Quiz', 'Mike Davis');
INSERT INTO quizzes (title, creator) VALUES ('Geography Test', 'Laura Wilson');
INSERT INTO quizzes (title, creator) VALUES ('Music Trivia', 'Chris Lee');
INSERT INTO quizzes (title, creator) VALUES ('Animal Kingdom', 'Sarah Clark');
INSERT INTO quizzes (title, creator) VALUES ('Sports Quiz', 'Tom Allen');
