CREATE TABLE IF NOT EXISTS user_registrations (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO user_registrations (username, email) VALUES ('JohnDoe', 'johndoe@example.com');
INSERT INTO user_registrations (username, email) VALUES ('JaneSmith', 'janesmith@example.com');
INSERT INTO user_registrations (username, email) VALUES ('AliceJohnson', 'alicejohnson@example.com');
INSERT INTO user_registrations (username, email) VALUES ('BobBrown', 'bobbrown@example.com');
INSERT INTO user_registrations (username, email) VALUES ('SarahMiller', 'sarahmiller@example.com');
INSERT INTO user_registrations (username, email) VALUES ('MikeTaylor', 'miketaylor@example.com');
INSERT INTO user_registrations (username, email) VALUES ('EmilyClark', 'emilyclark@example.com');
INSERT INTO user_registrations (username, email) VALUES ('ChrisDavis', 'chrisdavis@example.com');
INSERT INTO user_registrations (username, email) VALUES ('LauraMartinez', 'lauramartinez@example.com');
INSERT INTO user_registrations (username, email) VALUES ('KevinWhite', 'kevinwhite@example.com');
