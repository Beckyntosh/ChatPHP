CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS preferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    preference_type VARCHAR(50) NOT NULL,
    preference_value VARCHAR(255) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (username, password, email, reg_date) VALUES ('JohnDoe', 'hashedpassword1', 'johndoe@example.com', NOW());
INSERT INTO users (username, password, email, reg_date) VALUES ('JaneSmith', 'hashedpassword2', 'janesmith@example.com', NOW());
INSERT INTO users (username, password, email, reg_date) VALUES ('AliceJones', 'hashedpassword3', 'alicejones@example.com', NOW());
INSERT INTO users (username, password, email, reg_date) VALUES ('BobBrown', 'hashedpassword4', 'bobbrown@example.com', NOW());
INSERT INTO users (username, password, email, reg_date) VALUES ('EmilyDavis', 'hashedpassword5', 'emilydavis@example.com', NOW());

INSERT INTO preferences (user_id, preference_type, preference_value) VALUES (1, 'news_category', 'Skincare');
INSERT INTO preferences (user_id, preference_type, preference_value) VALUES (1, 'news_category', 'Trends');
INSERT INTO preferences (user_id, preference_type, preference_value) VALUES (2, 'news_category', 'Products');
INSERT INTO preferences (user_id, preference_type, preference_value) VALUES (3, 'news_category', 'Research');
INSERT INTO preferences (user_id, preference_type, preference_value) VALUES (3, 'news_category', 'Trends');
INSERT INTO preferences (user_id, preference_type, preference_value) VALUES (4, 'news_category', 'Skincare');
INSERT INTO preferences (user_id, preference_type, preference_value) VALUES (5, 'news_category', 'Products');
INSERT INTO preferences (user_id, preference_type, preference_value) VALUES (1, 'news_category', 'Research');
INSERT INTO preferences (user_id, preference_type, preference_value) VALUES (2, 'news_category', 'Skincare');
INSERT INTO preferences (user_id, preference_type, preference_value) VALUES (4, 'news_category', 'Trends');
