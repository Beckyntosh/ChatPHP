CREATE TABLE IF NOT EXISTS users (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    language_preference VARCHAR(5) DEFAULT 'en',
    reg_date TIMESTAMP
);

INSERT INTO users (username, email, language_preference) VALUES ('JohnDoe', 'johndoe@example.com', 'en');
INSERT INTO users (username, email, language_preference) VALUES ('AliceSmith', 'alice.smith@example.com', 'fr');
INSERT INTO users (username, email, language_preference) VALUES ('BobBrown', 'bob.brown@example.com', 'de');
INSERT INTO users (username, email, language_preference) VALUES ('EveJohnson', 'eve.johnson@example.com', 'es');
INSERT INTO users (username, email, language_preference) VALUES ('MikeWilliams', 'mike.williams@example.com', 'en');
INSERT INTO users (username, email, language_preference) VALUES ('SophiaLee', 'sophia.lee@example.com', 'fr');
INSERT INTO users (username, email, language_preference) VALUES ('KevinMiller', 'kevin.miller@example.com', 'de');
INSERT INTO users (username, email, language_preference) VALUES ('OliviaGarcia', 'olivia.garcia@example.com', 'es');
INSERT INTO users (username, email, language_preference) VALUES ('ChrisBrown', 'chris.brown@example.com', 'en');
INSERT INTO users (username, email, language_preference) VALUES ('EmmaDavis', 'emma.davis@example.com', 'fr');
