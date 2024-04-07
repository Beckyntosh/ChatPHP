CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(32) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS preferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    category VARCHAR(255) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (email, password) VALUES ('user1@example.com', 'password1');
INSERT INTO users (email, password) VALUES ('user2@example.com', 'password2');
INSERT INTO users (email, password) VALUES ('user3@example.com', 'password3');
INSERT INTO users (email, password) VALUES ('user4@example.com', 'password4');
INSERT INTO users (email, password) VALUES ('user5@example.com', 'password5');
INSERT INTO users (email, password) VALUES ('user6@example.com', 'password6');
INSERT INTO users (email, password) VALUES ('user7@example.com', 'password7');
INSERT INTO users (email, password) VALUES ('user8@example.com', 'password8');
INSERT INTO users (email, password) VALUES ('user9@example.com', 'password9');
INSERT INTO users (email, password) VALUES ('user10@example.com', 'password10');

INSERT INTO preferences (user_id, category) VALUES (1, 'Technology');
INSERT INTO preferences (user_id, category) VALUES (1, 'Science');
INSERT INTO preferences (user_id, category) VALUES (2, 'Entertainment');
INSERT INTO preferences (user_id, category) VALUES (3, 'Sports');
INSERT INTO preferences (user_id, category) VALUES (4, 'Technology');
INSERT INTO preferences (user_id, category) VALUES (5, 'Science');
INSERT INTO preferences (user_id, category) VALUES (6, 'Technology');
INSERT INTO preferences (user_id, category) VALUES (7, 'Entertainment');
INSERT INTO preferences (user_id, category) VALUES (8, 'Science');
INSERT INTO preferences (user_id, category) VALUES (9, 'Sports');