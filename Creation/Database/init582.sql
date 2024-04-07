CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL,
    2FA_code VARCHAR(6) NOT NULL
);

INSERT INTO users (username, password, 2FA_code) VALUES ('user1', 'pass1', '123456');
INSERT INTO users (username, password, 2FA_code) VALUES ('user2', 'pass2', '654321');
INSERT INTO users (username, password, 2FA_code) VALUES ('user3', 'pass3', '987654');
INSERT INTO users (username, password, 2FA_code) VALUES ('user4', 'pass4', '456789');
INSERT INTO users (username, password, 2FA_code) VALUES ('user5', 'pass5', '321654');
INSERT INTO users (username, password, 2FA_code) VALUES ('user6', 'pass6', '654123');
INSERT INTO users (username, password, 2FA_code) VALUES ('user7', 'pass7', '789123');
INSERT INTO users (username, password, 2FA_code) VALUES ('user8', 'pass8', '456321');
INSERT INTO users (username, password, 2FA_code) VALUES ('user9', 'pass9', '321789');
INSERT INTO users (username, password, 2FA_code) VALUES ('user10', 'pass10', '987123');