CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(255) NOT NULL,
isActive BOOLEAN NOT NULL DEFAULT TRUE,
reg_date TIMESTAMP
);

INSERT INTO users (username, email, password, isActive, reg_date) VALUES ('JohnDoe', 'johndoe@example.com', 'password123', TRUE, NOW());
INSERT INTO users (username, email, password, isActive, reg_date) VALUES ('JaneSmith', 'janesmith@example.com', 'abcde', TRUE, NOW());
INSERT INTO users (username, email, password, isActive, reg_date) VALUES ('AliceGreen', 'alicegreen@example.com', 'qwerty', TRUE, NOW());
INSERT INTO users (username, email, password, isActive, reg_date) VALUES ('BobBrown', 'bobbrown@example.com', 'letmein', TRUE, NOW());
INSERT INTO users (username, email, password, isActive, reg_date) VALUES ('EveWhite', 'evewhite@example.com', 'password', TRUE, NOW());
INSERT INTO users (username, email, password, isActive, reg_date) VALUES ('SamTaylor', 'samtaylor@example.com', 'securepass', TRUE, NOW());
INSERT INTO users (username, email, password, isActive, reg_date) VALUES ('OliviaDavis', 'oliviadavis@example.com', 'p@ssw0rd', TRUE, NOW());
INSERT INTO users (username, email, password, isActive, reg_date) VALUES ('MichaelJohnson', 'michaeljohnson@example.com', 'hello123', TRUE, NOW());
INSERT INTO users (username, email, password, isActive, reg_date) VALUES ('EmilyClark', 'emilyclark@example.com', '987654', TRUE, NOW());
INSERT INTO users (username, email, password, isActive, reg_date) VALUES ('JackAnderson', 'jackanderson@example.com', 'password321', TRUE, NOW());
