CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
preferred_language VARCHAR(5) DEFAULT 'en',
reg_date TIMESTAMP
);

INSERT INTO users (username, email, preferred_language) VALUES ('JohnDoe', 'johndoe@example.com', 'en');
INSERT INTO users (username, email, preferred_language) VALUES ('JaneSmith', 'janesmith@example.com', 'es');
INSERT INTO users (username, email, preferred_language) VALUES ('MarkMiller', 'markmiller@example.com', 'fr');
INSERT INTO users (username, email, preferred_language) VALUES ('EmilyBrown', 'emilybrown@example.com', 'de');
INSERT INTO users (username, email, preferred_language) VALUES ('AlexClark', 'alexclark@example.com', 'en');
INSERT INTO users (username, email, preferred_language) VALUES ('SarahWilson', 'sarahwilson@example.com', 'es');
INSERT INTO users (username, email, preferred_language) VALUES ('MichaelDavis', 'michaeldavis@example.com', 'fr');
INSERT INTO users (username, email, preferred_language) VALUES ('JessicaLee', 'jessicalee@example.com', 'de');
INSERT INTO users (username, email, preferred_language) VALUES ('RyanWhite', 'ryanwhite@example.com', 'en');
INSERT INTO users (username, email, preferred_language) VALUES ('LauraTaylor', 'laurataylor@example.com', 'es');