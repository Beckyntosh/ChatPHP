CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(100) NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO users (username, password, reg_date) VALUES ('john_doe', 'password123', NOW());
INSERT INTO users (username, password, reg_date) VALUES ('jane_smith', 'securepass', NOW());
INSERT INTO users (username, password, reg_date) VALUES ('bob_jenkins', 'p@ssw0rd', NOW());
INSERT INTO users (username, password, reg_date) VALUES ('amy_parker', 'mySecurePwd', NOW());
INSERT INTO users (username, password, reg_date) VALUES ('mike_adams', 'pass12345', NOW());
INSERT INTO users (username, password, reg_date) VALUES ('sara_miller', '123password', NOW());
INSERT INTO users (username, password, reg_date) VALUES ('tom_wilson', 'pwd1234', NOW());
INSERT INTO users (username, password, reg_date) VALUES ('lisa_jackson', 'secure123', NOW());
INSERT INTO users (username, password, reg_date) VALUES ('chris_brown', 'passwordABC', NOW());
INSERT INTO users (username, password, reg_date) VALUES ('emily_white', 'newpwd2022', NOW());
