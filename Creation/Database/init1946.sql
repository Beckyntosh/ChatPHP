CREATE TABLE IF NOT EXISTS users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30) NOT NULL,
  password VARCHAR(30) NOT NULL
);

CREATE TABLE IF NOT EXISTS code_reviews (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id INT(6) UNSIGNED,
  title VARCHAR(50) NOT NULL,
  code TEXT NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (username, password) VALUES ('user1', 'password1');
INSERT INTO users (username, password) VALUES ('user2', 'password2');
INSERT INTO users (username, password) VALUES ('user3', 'password3');
INSERT INTO users (username, password) VALUES ('user4', 'password4');
INSERT INTO users (username, password) VALUES ('user5', 'password5');
INSERT INTO users (username, password) VALUES ('user6', 'password6');
INSERT INTO users (username, password) VALUES ('user7', 'password7');
INSERT INTO users (username, password) VALUES ('user8', 'password8');
INSERT INTO users (username, password) VALUES ('user9', 'password9');
INSERT INTO users (username, password) VALUES ('user10', 'password10');

INSERT INTO code_reviews (user_id, title, code) VALUES (1, 'Review 1', 'Code for Review 1');
INSERT INTO code_reviews (user_id, title, code) VALUES (2, 'Review 2', 'Code for Review 2');
INSERT INTO code_reviews (user_id, title, code) VALUES (3, 'Review 3', 'Code for Review 3');
INSERT INTO code_reviews (user_id, title, code) VALUES (4, 'Review 4', 'Code for Review 4');
INSERT INTO code_reviews (user_id, title, code) VALUES (5, 'Review 5', 'Code for Review 5');
INSERT INTO code_reviews (user_id, title, code) VALUES (6, 'Review 6', 'Code for Review 6');
INSERT INTO code_reviews (user_id, title, code) VALUES (7, 'Review 7', 'Code for Review 7');
INSERT INTO code_reviews (user_id, title, code) VALUES (8, 'Review 8', 'Code for Review 8');
INSERT INTO code_reviews (user_id, title, code) VALUES (9, 'Review 9', 'Code for Review 9');
INSERT INTO code_reviews (user_id, title, code) VALUES (10, 'Review 10', 'Code for Review 10');