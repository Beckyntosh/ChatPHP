CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    verified TINYINT(1) DEFAULT 0,
    token VARCHAR(32),
    reg_date TIMESTAMP
);

INSERT INTO users (username, email, token) VALUES ('JohnDoe', 'johndoe@example.com', 'token1');
INSERT INTO users (username, email, token) VALUES ('JaneSmith', 'janesmith@example.com', 'token2');
INSERT INTO users (username, email, token) VALUES ('AliceBrown', 'alicebrown@example.com', 'token3');
INSERT INTO users (username, email, token) VALUES ('BobJohnson', 'bobjohnson@example.com', 'token4');
INSERT INTO users (username, email, token) VALUES ('EvaDavis', 'evadavis@example.com', 'token5');
INSERT INTO users (username, email, token) VALUES ('SamWilson', 'samwilson@example.com', 'token6');
INSERT INTO users (username, email, token) VALUES ('OliviaMoore', 'oliviamoore@example.com', 'token7');
INSERT INTO users (username, email, token) VALUES ('MaxLee', 'maxlee@example.com', 'token8');
INSERT INTO users (username, email, token) VALUES ('SophieClark', 'sophieclark@example.com', 'token9');
INSERT INTO users (username, email, token) VALUES ('JakeAdams', 'jakeadams@example.com', 'token10');
