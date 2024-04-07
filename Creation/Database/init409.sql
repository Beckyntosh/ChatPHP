CREATE TABLE IF NOT EXISTS languages (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
language_name VARCHAR(30) NOT NULL,
reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
preferred_language INT(6) UNSIGNED,
reg_date TIMESTAMP,
FOREIGN KEY (preferred_language) REFERENCES languages(id)
);

INSERT INTO languages (language_name, reg_date) VALUES ('English', NOW());
INSERT INTO languages (language_name, reg_date) VALUES ('Spanish', NOW());
INSERT INTO languages (language_name, reg_date) VALUES ('French', NOW());

INSERT INTO users (username, email, preferred_language, reg_date) VALUES ('JohnDoe', 'john.doe@example.com', 1, NOW());
INSERT INTO users (username, email, preferred_language, reg_date) VALUES ('JaneSmith', 'jane.smith@example.com', 2, NOW());
INSERT INTO users (username, email, preferred_language, reg_date) VALUES ('AliceBrown', 'alice.brown@example.com', 3, NOW());
INSERT INTO users (username, email, preferred_language, reg_date) VALUES ('BobGreen', 'bob.green@example.com', 1, NOW());
INSERT INTO users (username, email, preferred_language, reg_date) VALUES ('SarahWhite', 'sarah.white@example.com', 2, NOW());
INSERT INTO users (username, email, preferred_language, reg_date) VALUES ('MikeBlack', 'mike.black@example.com', 3, NOW());
INSERT INTO users (username, email, preferred_language, reg_date) VALUES ('EmilyGray', 'emily.gray@example.com', 1, NOW());
INSERT INTO users (username, email, preferred_language, reg_date) VALUES ('ChrisTaylor', 'chris.taylor@example.com', 2, NOW());
INSERT INTO users (username, email, preferred_language, reg_date) VALUES ('LauraJohnson', 'laura.johnson@example.com', 3, NOW());
INSERT INTO users (username, email, preferred_language, reg_date) VALUES ('MattWilson', 'matt.wilson@example.com', 1, NOW());