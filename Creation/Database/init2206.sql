CREATE TABLE IF NOT EXISTS subscribers (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    token VARCHAR(32) NOT NULL,
    confirmed TINYINT(1) NOT NULL DEFAULT 0,
    reg_date TIMESTAMP
);

INSERT INTO subscribers(email, token) VALUES ('user1@example.com', 'token1');
INSERT INTO subscribers(email, token) VALUES ('user2@example.com', 'token2');
INSERT INTO subscribers(email, token) VALUES ('user3@example.com', 'token3');
INSERT INTO subscribers(email, token) VALUES ('user4@example.com', 'token4');
INSERT INTO subscribers(email, token) VALUES ('user5@example.com', 'token5');
INSERT INTO subscribers(email, token) VALUES ('user6@example.com', 'token6');
INSERT INTO subscribers(email, token) VALUES ('user7@example.com', 'token7');
INSERT INTO subscribers(email, token) VALUES ('user8@example.com', 'token8');
INSERT INTO subscribers(email, token) VALUES ('user9@example.com', 'token9');
INSERT INTO subscribers(email, token) VALUES ('user10@example.com', 'token10');
