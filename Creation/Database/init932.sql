CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL
);

-- Insert values
INSERT INTO users (username, password) VALUES ('john_doe', 'password123');
INSERT INTO users (username, password) VALUES ('alice_smith', 'letmein');
INSERT INTO users (username, password) VALUES ('bob_jackson', 'securepass');
INSERT INTO users (username, password) VALUES ('emily_white', 'p@ssw0rd');
INSERT INTO users (username, password) VALUES ('mike_adams', 'qwerty');
INSERT INTO users (username, password) VALUES ('sara_williams', '123456');
INSERT INTO users (username, password) VALUES ('mark_brown', 'password');
INSERT INTO users (username, password) VALUES ('julie_green', 'password1234');
INSERT INTO users (username, password) VALUES ('sam_smith', 'ilovebooks');
INSERT INTO users (username, password) VALUES ('laura_carter', 'booksrock');