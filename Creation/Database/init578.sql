CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, password) VALUES ('john_doe', 'password123');
INSERT INTO users (username, password) VALUES ('jane_smith', 'pass456');
INSERT INTO users (username, password) VALUES ('bob_jones', 'secret321');
INSERT INTO users (username, password) VALUES ('alice_wonderland', 'qwerty789');
INSERT INTO users (username, password) VALUES ('sam_adams', 'letmein123');
INSERT INTO users (username, password) VALUES ('emily_davis', 'summer20');
INSERT INTO users (username, password) VALUES ('michael_green', 'spring2021');
INSERT INTO users (username, password) VALUES ('sophia_turner', 'hello456');
INSERT INTO users (username, password) VALUES ('adam_white', 'p@ssw0rd');
INSERT INTO users (username, password) VALUES ('laura_brown', 'welcome123');