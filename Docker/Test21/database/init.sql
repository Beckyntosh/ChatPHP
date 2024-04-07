CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    language_preference VARCHAR(5) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO users (username, email, language_preference) VALUES ('user1', 'user1@email.com', 'en');
INSERT INTO users (username, email, language_preference) VALUES ('user2', 'user2@email.com', 'fr');
INSERT INTO users (username, email, language_preference) VALUES ('user3', 'user3@email.com', 'es');
INSERT INTO users (username, email, language_preference) VALUES ('user4', 'user4@email.com', 'de');
INSERT INTO users (username, email, language_preference) VALUES ('user5', 'user5@email.com', 'en');
INSERT INTO users (username, email, language_preference) VALUES ('user6', 'user6@email.com', 'fr');
INSERT INTO users (username, email, language_preference) VALUES ('user7', 'user7@email.com', 'es');
INSERT INTO users (username, email, language_preference) VALUES ('user8', 'user8@email.com', 'de');
INSERT INTO users (username, email, language_preference) VALUES ('user9', 'user9@email.com', 'en');
INSERT INTO users (username, email, language_preference) VALUES ('user10', 'user10@email.com', 'fr');
