CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(50) NOT NULL UNIQUE
);

INSERT INTO users (username, email) VALUES ('JohnDoe', 'johndoe@example.com');
INSERT INTO users (username, email) VALUES ('JaneSmith', 'janesmith@example.com');
INSERT INTO users (username, email) VALUES ('AliceJohnson', 'alicejohnson@example.com');
INSERT INTO users (username, email) VALUES ('BobBrown', 'bobbrown@example.com');
INSERT INTO users (username, email) VALUES ('SarahWilson', 'sarahwilson@example.com');
INSERT INTO users (username, email) VALUES ('MichaelDavis', 'michaeldavis@example.com');
INSERT INTO users (username, email) VALUES ('EmilyMartinez', 'emilymartinez@example.com');
INSERT INTO users (username, email) VALUES ('RyanGarcia', 'ryangarcia@example.com');
INSERT INTO users (username, email) VALUES ('OliviaTaylor', 'oliviataylor@example.com');
INSERT INTO users (username, email) VALUES ('DavidAnderson', 'davidanderson@example.com');