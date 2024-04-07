CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    token VARCHAR(50) NOT NULL,
    verified TINYINT(1) NOT NULL DEFAULT '0',
    reg_date TIMESTAMP
);

INSERT INTO users (email, token, verified, reg_date) VALUES ('user1@example.com', 'token1', 1, NOW());
INSERT INTO users (email, token, verified, reg_date) VALUES ('user2@example.com', 'token2', 1, NOW());
INSERT INTO users (email, token, verified, reg_date) VALUES ('user3@example.com', 'token3', 0, NOW());
INSERT INTO users (email, token, verified, reg_date) VALUES ('user4@example.com', 'token4', 0, NOW());
INSERT INTO users (email, token, verified, reg_date) VALUES ('user5@example.com', 'token5', 1, NOW());
INSERT INTO users (email, token, verified, reg_date) VALUES ('user6@example.com', 'token6', 0, NOW());
INSERT INTO users (email, token, verified, reg_date) VALUES ('user7@example.com', 'token7', 1, NOW());
INSERT INTO users (email, token, verified, reg_date) VALUES ('user8@example.com', 'token8', 1, NOW());
INSERT INTO users (email, token, verified, reg_date) VALUES ('user9@example.com', 'token9', 0, NOW());
INSERT INTO users (email, token, verified, reg_date) VALUES ('user10@example.com', 'token10', 1, NOW());
