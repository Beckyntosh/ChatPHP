CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    isActive TINYINT(1) DEFAULT 1
);

INSERT INTO users (username, email) VALUES ('JohnDoe', 'johndoe@example.com');
INSERT INTO users (username, email) VALUES ('JaneSmith', 'janesmith@example.com');
INSERT INTO users (username, email) VALUES ('AliceBrown', 'alicebrown@example.com');
INSERT INTO users (username, email) VALUES ('BobWhite', 'bobwhite@example.com');
INSERT INTO users (username, email) VALUES ('CharlieGreen', 'charliegreen@example.com');
INSERT INTO users (username, email) VALUES ('EveBlack', 'eveblack@example.com');
INSERT INTO users (username, email) VALUES ('FrankLee', 'franklee@example.com');
INSERT INTO users (username, email) VALUES ('GraceMorgan', 'gracemorgan@example.com');
INSERT INTO users (username, email) VALUES ('HenryClark', 'henryclark@example.com');
INSERT INTO users (username, email) VALUES ('IvyDavis', 'ivydavis@example.com');
