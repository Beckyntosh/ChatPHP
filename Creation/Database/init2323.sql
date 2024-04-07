CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50) NOT NULL,
password VARCHAR(32) NOT NULL,
reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS events (
event_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
event_name VARCHAR(50) NOT NULL,
description TEXT NOT NULL,
event_date DATE NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO users (username, email, password) VALUES ('JohnDoe', 'johndoe@example.com', 'password123');
INSERT INTO users (username, email, password) VALUES ('JaneSmith', 'janesmith@example.com', 'securepwd456');
INSERT INTO users (username, email, password) VALUES ('AliceJohnson', 'alice@example.com', 'qwerty789');
INSERT INTO users (username, email, password) VALUES ('BobWilliams', 'bob@example.com', 'p@55w0rd');
INSERT INTO users (username, email, password) VALUES ('EmilyBrown', 'emily@example.com', 'brownie123');
INSERT INTO users (username, email, password) VALUES ('DavidLee', 'david@example.com', 'pass1234');
INSERT INTO users (username, email, password) VALUES ('SarahDavis', 'sarah@example.com', 'securepass');
INSERT INTO users (username, email, password) VALUES ('MichaelWilson', 'michael@example.com', 'wilsonmike');
INSERT INTO users (username, email, password) VALUES ('EvaMartinez', 'eva@example.com', 'martinezeva');
INSERT INTO users (username, email, password) VALUES ('KevinGarcia', 'kevin@example.com', 'garcia123');
