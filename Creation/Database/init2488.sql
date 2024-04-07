CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(60) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
);

INSERT INTO users (username, password, email) VALUES ('john_doe', 'password123', 'john.doe@example.com');
INSERT INTO users (username, password, email) VALUES ('jane_smith', 'securepass321', 'jane.smith@example.com');
INSERT INTO users (username, password, email) VALUES ('adam_wilson', 'abc123', 'adam.wilson@example.com');
INSERT INTO users (username, password, email) VALUES ('sarah_jones', 'mysecret321', 'sarah.jones@example.com');
INSERT INTO users (username, password, email) VALUES ('michael_carter', 'p@ssword', 'michael.carter@example.com');
INSERT INTO users (username, password, email) VALUES ('lisa_brown', 'supersecretpass', 'lisa.brown@example.com');
INSERT INTO users (username, password, email) VALUES ('ryan_evans', 'password456', 'ryan.evans@example.com');
INSERT INTO users (username, password, email) VALUES ('emma_garcia', 'securepassword', 'emma.garcia@example.com');
INSERT INTO users (username, password, email) VALUES ('alex_miller', 'pass123word', 'alex.miller@example.com');
INSERT INTO users (username, password, email) VALUES ('jessica_taylor', 'passwordabc', 'jessica.taylor@example.com');
