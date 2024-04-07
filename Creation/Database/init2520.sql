CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    preferred_language VARCHAR(5) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO users (username, email, preferred_language) VALUES ('JohnDoe', 'johndoe@example.com', 'en');
INSERT INTO users (username, email, preferred_language) VALUES ('JaneSmith', 'janesmith@example.com', 'es');
INSERT INTO users (username, email, preferred_language) VALUES ('MichaelJohnson', 'michaelj@example.com', 'fr');
INSERT INTO users (username, email, preferred_language) VALUES ('SaraLee', 'saralee@example.com', 'en');
INSERT INTO users (username, email, preferred_language) VALUES ('MarioRossi', 'mario@example.com', 'it');
INSERT INTO users (username, email, preferred_language) VALUES ('SophieBrown', 'sophie@example.com', 'en');
INSERT INTO users (username, email, preferred_language) VALUES ('LuisGarcia', 'luisg@example.com', 'es');
INSERT INTO users (username, email, preferred_language) VALUES ('AnnaChen', 'anna@example.com', 'zh');
INSERT INTO users (username, email, preferred_language) VALUES ('PabloMartinez', 'pablo@example.com', 'es');
INSERT INTO users (username, email, preferred_language) VALUES ('ElenaSantos', 'elena@example.com', 'es');
