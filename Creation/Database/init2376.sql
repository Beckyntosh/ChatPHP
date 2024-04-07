CREATE TABLE IF NOT EXISTS users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, password) VALUES ('john_doe', 'password123');
INSERT INTO users (username, password) VALUES ('jane_smith', 'qwerty456');
INSERT INTO users (username, password) VALUES ('mike_jackson', 'letmein789');
INSERT INTO users (username, password) VALUES ('amy_wong', 'passwordabc');
INSERT INTO users (username, password) VALUES ('sam_brown', 'securepass321');
INSERT INTO users (username, password) VALUES ('lisa_jones', 'p@ssw0rd');
INSERT INTO users (username, password) VALUES ('alex_white', 'newpassword');
INSERT INTO users (username, password) VALUES ('sara_moore', '12345678');
INSERT INTO users (username, password) VALUES ('david_miller', 'pass123word');
INSERT INTO users (username, password) VALUES ('emily_davis', 'goodpwd2022');
