CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(255) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
);

INSERT INTO users (username, password, email) VALUES ('john_doe', 'password123', 'john.doe@example.com');
INSERT INTO users (username, password, email) VALUES ('alice_smith', 'securepass456', 'alice.smith@example.com');
INSERT INTO users (username, password, email) VALUES ('bob_jones', 'qwerty123', 'bob.jones@example.com');
INSERT INTO users (username, password, email) VALUES ('mary_white', 'p@ssw0rd', 'mary.white@example.com');
INSERT INTO users (username, password, email) VALUES ('sam_brown', 'brownie456', 'sam.brown@example.com');
INSERT INTO users (username, password, email) VALUES ('emily_grey', 'password123', 'emily.grey@example.com');
INSERT INTO users (username, password, email) VALUES ('michael_adams', 'securepass456', 'michael.adams@example.com');
INSERT INTO users (username, password, email) VALUES ('sophia_miller', 'qwerty123', 'sohpia.miller@example.com');
INSERT INTO users (username, password, email) VALUES ('david_wilson', 'p@ssw0rd', 'david.wilson@example.com');
INSERT INTO users (username, password, email) VALUES ('laura_green', 'greenie123', 'laura.green@example.com');
