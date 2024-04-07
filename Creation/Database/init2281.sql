CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(32),
verification_code VARCHAR(64),
verified TINYINT(1) NOT NULL DEFAULT 0,
reg_date TIMESTAMP
);

INSERT INTO users (username, email, password, verification_code, verified, reg_date) VALUES ('User1', 'user1@example.com', 'password1', 'verificationcode1', 1, NOW());
INSERT INTO users (username, email, password, verification_code, verified, reg_date) VALUES ('User2', 'user2@example.com', 'password2', 'verificationcode2', 0, NOW());
INSERT INTO users (username, email, password, verification_code, verified, reg_date) VALUES ('User3', 'user3@example.com', 'password3', 'verificationcode3', 0, NOW());
INSERT INTO users (username, email, password, verification_code, verified, reg_date) VALUES ('User4', 'user4@example.com', 'password4', 'verificationcode4', 1, NOW());
INSERT INTO users (username, email, password, verification_code, verified, reg_date) VALUES ('User5', 'user5@example.com', 'password5', 'verificationcode5', 0, NOW());
INSERT INTO users (username, email, password, verification_code, verified, reg_date) VALUES ('User6', 'user6@example.com', 'password6', 'verificationcode6', 1, NOW());
INSERT INTO users (username, email, password, verification_code, verified, reg_date) VALUES ('User7', 'user7@example.com', 'password7', 'verificationcode7', 0, NOW());
INSERT INTO users (username, email, password, verification_code, verified, reg_date) VALUES ('User8', 'user8@example.com', 'password8', 'verificationcode8', 1, NOW());
INSERT INTO users (username, email, password, verification_code, verified, reg_date) VALUES ('User9', 'user9@example.com', 'password9', 'verificationcode9', 0, NOW());
INSERT INTO users (username, email, password, verification_code, verified, reg_date) VALUES ('User10', 'user10@example.com', 'password10', 'verificationcode10', 1, NOW());