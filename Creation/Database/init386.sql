CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, email, password) VALUES ('john_doe', 'john.doe@example.com', 'hashedpassword1');
INSERT INTO users (username, email, password) VALUES ('jane_smith', 'jane.smith@example.com', 'hashedpassword2');
INSERT INTO users (username, email, password) VALUES ('bob_jackson', 'bob.jackson@example.com', 'hashedpassword3');
INSERT INTO users (username, email, password) VALUES ('alice_johnson', 'alice.johnson@example.com', 'hashedpassword4');
INSERT INTO users (username, email, password) VALUES ('sam_green', 'sam.green@example.com', 'hashedpassword5');
INSERT INTO users (username, email, password) VALUES ('sarah_white', 'sarah.white@example.com', 'hashedpassword6');
INSERT INTO users (username, email, password) VALUES ('mike_brown', 'mike.brown@example.com', 'hashedpassword7');
INSERT INTO users (username, email, password) VALUES ('emily_adams', 'emily.adams@example.com', 'hashedpassword8');
INSERT INTO users (username, email, password) VALUES ('ryan_parker', 'ryan.parker@example.com', 'hashedpassword9');
INSERT INTO users (username, email, password) VALUES ('lisa_miller', 'lisa.miller@example.com', 'hashedpassword10');