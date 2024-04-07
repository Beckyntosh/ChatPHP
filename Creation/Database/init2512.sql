CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
preferred_language VARCHAR(5) NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO users (username, preferred_language) VALUES ('JohnDoe', 'en');
INSERT INTO users (username, preferred_language) VALUES ('JaneSmith', 'fr');
INSERT INTO users (username, preferred_language) VALUES ('AliceJones', 'de');
INSERT INTO users (username, preferred_language) VALUES ('BobBrown', 'es');
INSERT INTO users (username, preferred_language) VALUES ('EmilyDavis', 'en');
INSERT INTO users (username, preferred_language) VALUES ('MichaelWilson', 'fr');
INSERT INTO users (username, preferred_language) VALUES ('SarahLee', 'de');
INSERT INTO users (username, preferred_language) VALUES ('DavidMiller', 'es');
INSERT INTO users (username, preferred_language) VALUES ('LauraTaylor', 'en');
INSERT INTO users (username, preferred_language) VALUES ('PeterCox', 'fr');
