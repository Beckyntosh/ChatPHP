CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    secret_question VARCHAR(255) NOT NULL,
    secret_answer VARCHAR(255) NOT NULL
);

INSERT INTO users (username, secret_question, secret_answer) VALUES ('john_doe', 'What is your favorite color?', MD5('blue'));
INSERT INTO users (username, secret_question, secret_answer) VALUES ('jane_smith', 'What is your pet\'s name?', MD5('fluffy'));
INSERT INTO users (username, secret_question, secret_answer) VALUES ('mark_jackson', 'Where were you born?', MD5('new york'));
INSERT INTO users (username, secret_question, secret_answer) VALUES ('sara_parker', 'Who is your favorite teacher?', MD5('mr_smith'));
INSERT INTO users (username, secret_question, secret_answer) VALUES ('michael_adams', 'What is your mother\'s maiden name?', MD5('johnson'));
INSERT INTO users (username, secret_question, secret_answer) VALUES ('emily_harris', 'What is your dream job?', MD5('pilot'));
INSERT INTO users (username, secret_question, secret_answer) VALUES ('adam_miller', 'What is your favorite food?', MD5('pizza'));
INSERT INTO users (username, secret_question, secret_answer) VALUES ('laura_clark', 'Who is your childhood best friend?', MD5('susan'));
INSERT INTO users (username, secret_question, secret_answer) VALUES ('chris_wilson', 'What is the name of your first pet?', MD5('fluffy'));
INSERT INTO users (username, secret_question, secret_answer) VALUES ('rachel_green', 'What is your favorite movie?', MD5('inception'));
