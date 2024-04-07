CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO users (username, email, password) VALUES ('user1', 'user1@example.com', 'password123');
INSERT INTO users (username, email, password) VALUES ('user2', 'user2@example.com', 'password456');
INSERT INTO users (username, email, password) VALUES ('user3', 'user3@example.com', 'password789');
INSERT INTO users (username, email, password) VALUES ('user4', 'user4@example.com', 'passwordabc');
INSERT INTO users (username, email, password) VALUES ('user5', 'user5@example.com', 'passworddef');
INSERT INTO users (username, email, password) VALUES ('user6', 'user6@example.com', 'passwordghi');
INSERT INTO users (username, email, password) VALUES ('user7', 'user7@example.com', 'passwordjkl');
INSERT INTO users (username, email, password) VALUES ('user8', 'user8@example.com', 'passwordmno');
INSERT INTO users (username, email, password) VALUES ('user9', 'user9@example.com', 'passwordpqr');
INSERT INTO users (username, email, password) VALUES ('user10', 'user10@example.com', 'passwordstu');