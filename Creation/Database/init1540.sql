CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(50) NOT NULL,
    verified TINYINT NOT NULL DEFAULT 0,
    verification_code VARCHAR(255) NOT NULL,
    register_date TIMESTAMP
);

INSERT INTO users (username, email, password, verified, verification_code, register_date) VALUES ('user1', 'user1@example.com', 'password1', 1, 'code1', NOW());
INSERT INTO users (username, email, password, verified, verification_code, register_date) VALUES ('user2', 'user2@example.com', 'password2', 0, 'code2', NOW());
INSERT INTO users (username, email, password, verified, verification_code, register_date) VALUES ('user3', 'user3@example.com', 'password3', 0, 'code3', NOW());
INSERT INTO users (username, email, password, verified, verification_code, register_date) VALUES ('user4', 'user4@example.com', 'password4', 1, 'code4', NOW());
INSERT INTO users (username, email, password, verified, verification_code, register_date) VALUES ('user5', 'user5@example.com', 'password5', 0, 'code5', NOW());
INSERT INTO users (username, email, password, verified, verification_code, register_date) VALUES ('user6', 'user6@example.com', 'password6', 1, 'code6', NOW());
INSERT INTO users (username, email, password, verified, verification_code, register_date) VALUES ('user7', 'user7@example.com', 'password7', 0, 'code7', NOW());
INSERT INTO users (username, email, password, verified, verification_code, register_date) VALUES ('user8', 'user8@example.com', 'password8', 1, 'code8', NOW());
INSERT INTO users (username, email, password, verified, verification_code, register_date) VALUES ('user9', 'user9@example.com', 'password9', 0, 'code9', NOW());
INSERT INTO users (username, email, password, verified, verification_code, register_date) VALUES ('user10', 'user10@example.com', 'password10', 1, 'code10', NOW());