CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    preferred_language VARCHAR(50),
    reg_date TIMESTAMP
);

INSERT INTO users (username, email, preferred_language) VALUES ('JohnDoe', 'johndoe@example.com', 'English');
INSERT INTO users (username, email, preferred_language) VALUES ('JaneSmith', 'janesmith@example.com', 'Spanish');
INSERT INTO users (username, email, preferred_language) VALUES ('AliceJohnson', 'alicejohnson@example.com', 'French');
INSERT INTO users (username, email, preferred_language) VALUES ('BobBrown', 'bobbrown@example.com', 'German');
INSERT INTO users (username, email, preferred_language) VALUES ('ElenaGarcia', 'elenagarcia@example.com', 'English');
INSERT INTO users (username, email, preferred_language) VALUES ('DavidLee', 'davidlee@example.com', 'Spanish');
INSERT INTO users (username, email, preferred_language) VALUES ('SophieWilson', 'sophiewilson@example.com', 'French');
INSERT INTO users (username, email, preferred_language) VALUES ('MichaelSmith', 'michaelsmith@example.com', 'German');
INSERT INTO users (username, email, preferred_language) VALUES ('OliviaBrown', 'oliviabrown@example.com', 'English');
INSERT INTO users (username, email, preferred_language) VALUES ('WilliamJohnson', 'williamjohnson@example.com', 'Spanish');
