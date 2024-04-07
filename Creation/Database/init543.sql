CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    status VARCHAR(20)
);

CREATE TABLE reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    message VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (username, status) VALUES ('JohnDoe', 'active');
INSERT INTO users (username, status) VALUES ('JaneSmith', 'active');
INSERT INTO users (username, status) VALUES ('AliceBrown', 'active');
INSERT INTO users (username, status) VALUES ('BobWhite', 'active');
INSERT INTO users (username, status) VALUES ('EveJohnson', 'active');
INSERT INTO users (username, status) VALUES ('AlexGarcia', 'active');
INSERT INTO users (username, status) VALUES ('SophieLee', 'active');
INSERT INTO users (username, status) VALUES ('MichaelDavis', 'active');
INSERT INTO users (username, status) VALUES ('OliviaMartinez', 'active');
INSERT INTO users (username, status) VALUES ('WilliamRodriguez', 'active');

INSERT INTO reports (user_id, message) VALUES (1, 'Inappropriate behavior');
INSERT INTO reports (user_id, message) VALUES (2, 'Spamming messages');
INSERT INTO reports (user_id, message) VALUES (3, 'Harassment towards other users');
INSERT INTO reports (user_id, message) VALUES (4, 'Sharing inappropriate content');
INSERT INTO reports (user_id, message) VALUES (5, 'Violating community guidelines');
INSERT INTO reports (user_id, message) VALUES (6, 'Fraudulent activities');
INSERT INTO reports (user_id, message) VALUES (7, 'Impersonating another user');
INSERT INTO reports (user_id, message) VALUES (8, 'Creating fake accounts');
INSERT INTO reports (user_id, message) VALUES (9, 'Disruptive behavior');
INSERT INTO reports (user_id, message) VALUES (10, 'Misleading information');
