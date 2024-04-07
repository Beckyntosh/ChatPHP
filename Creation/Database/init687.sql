CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL
);

INSERT INTO users (username, email, password) VALUES ('john_doe', 'john.doe@example.com', 'password123');
INSERT INTO users (username, email, password) VALUES ('jane_smith', 'jane.smith@example.com', 'securepwd');
INSERT INTO users (username, email, password) VALUES ('bob_jenkins', 'bob.jenkins@example.com', 'pass123word');
INSERT INTO users (username, email, password) VALUES ('alice_carter', 'alice.carter@example.com', 'password1234');
INSERT INTO users (username, email, password) VALUES ('sam_wilson', 'sam.wilson@example.com', 'pwd987');
INSERT INTO users (username, email, password) VALUES ('lisa_phillips', 'lisa.phillips@example.com', 'ilovecoding');
INSERT INTO users (username, email, password) VALUES ('mike_brown', 'mike.brown@example.com', 'password456');
INSERT INTO users (username, email, password) VALUES ('sara_jones', 'sara.jones@example.com', 'securepass');
INSERT INTO users (username, email, password) VALUES ('peter_garcia', 'peter.garcia@example.com', 'letmein');
INSERT INTO users (username, email, password) VALUES ('robert_smith', 'robert.smith@example.com', 'mypassword');