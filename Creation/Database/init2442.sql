CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(50) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS news_preferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    preference VARCHAR(100) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (username, password, email) VALUES ('john_doe', 'password123', 'john.doe@example.com');
INSERT INTO users (username, password, email) VALUES ('jane_smith', 'hello123', 'jane.smith@example.com');
INSERT INTO users (username, password, email) VALUES ('robert_cole', 'test456', 'robert.cole@example.com');
INSERT INTO users (username, password, email) VALUES ('sara_jones', 'pass321', 'sara.jones@example.com');
INSERT INTO users (username, password, email) VALUES ('michael_brown', 'secure987', 'michael.brown@example.com');
INSERT INTO users (username, password, email) VALUES ('laura_jackson', 'p@ssw0rd', 'laura.jackson@example.com');
INSERT INTO users (username, password, email) VALUES ('adam_robinson', 'password', 'adam.robinson@example.com');
INSERT INTO users (username, password, email) VALUES ('emily_hall', 'abc123', 'emily.hall@example.com');
INSERT INTO users (username, password, email) VALUES ('william_white', 'qwerty', 'william.white@example.com');
INSERT INTO users (username, password, email) VALUES ('olivia_evans', 'passtest', 'olivia.evans@example.com');

INSERT INTO news_preferences (user_id, preference) VALUES (1, 'Football');
INSERT INTO news_preferences (user_id, preference) VALUES (1, 'Tennis');
INSERT INTO news_preferences (user_id, preference) VALUES (2, 'Basketball');
INSERT INTO news_preferences (user_id, preference) VALUES (3, 'Soccer');
INSERT INTO news_preferences (user_id, preference) VALUES (4, 'Golf');
INSERT INTO news_preferences (user_id, preference) VALUES (5, 'Baseball');
INSERT INTO news_preferences (user_id, preference) VALUES (6, 'Swimming');
INSERT INTO news_preferences (user_id, preference) VALUES (7, 'Running');
INSERT INTO news_preferences (user_id, preference) VALUES (8, 'Cycling');
INSERT INTO news_preferences (user_id, preference) VALUES (9, 'Volleyball');
