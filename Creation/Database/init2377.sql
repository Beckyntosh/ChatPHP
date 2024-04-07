CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(50),
    reg_date TIMESTAMP
);

INSERT INTO users (username, email, password) VALUES ('john_doe', 'john.doe@example.com', 'password123');
INSERT INTO users (username, email, password) VALUES ('alice_smith', 'alice.smith@example.com', 'pass321word');
INSERT INTO users (username, email, password) VALUES ('bob_jones', 'bob.jones@example.com', 'qwerty789');
INSERT INTO users (username, email, password) VALUES ('sarah_wilson', 'sarah.wilson@example.com', 'ilovecoding');
INSERT INTO users (username, email, password) VALUES ('mike_adams', 'mike.adams@example.com', 'securepass456');
INSERT INTO users (username, email, password) VALUES ('lisa_brown', 'lisa.brown@example.com', 'password1234');
INSERT INTO users (username, email, password) VALUES ('kevin_miller', 'kevin.miller@example.com', 'letmein789');
INSERT INTO users (username, email, password) VALUES ('emily_jackson', 'emily.jackson@example.com', 'passphrase22');
INSERT INTO users (username, email, password) VALUES ('adam_wright', 'adam.wright@example.com', 'ilovetech');
INSERT INTO users (username, email, password) VALUES ('sophia_clark', 'sophia.clark@example.com', 'p@ssW0rd');
