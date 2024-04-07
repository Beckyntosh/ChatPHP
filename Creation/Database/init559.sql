CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, email, password) VALUES ('john_doe', 'john@example.com', '123456');
INSERT INTO users (username, email, password) VALUES ('jane_smith', 'jane@example.com', 'password123');
INSERT INTO users (username, email, password) VALUES ('bob_jackson', 'bob@example.com', 'securepass');
INSERT INTO users (username, email, password) VALUES ('alice_miller', 'alice@example.com', 'letmein');
INSERT INTO users (username, email, password) VALUES ('sam_jones', 'sam@example.com', 'p@ssw0rd');
INSERT INTO users (username, email, password) VALUES ('sara_davis', 'sara@example.com', '123abc');
INSERT INTO users (username, email, password) VALUES ('matt_robinson', 'matt@example.com', 'pass1234');
INSERT INTO users (username, email, password) VALUES ('emily_brown', 'emily@example.com', 'password2');
INSERT INTO users (username, email, password) VALUES ('alex_garcia', 'alex@example.com', 'password12345');
INSERT INTO users (username, email, password) VALUES ('lisa_wilson', 'lisa@example.com', '789xyz');
