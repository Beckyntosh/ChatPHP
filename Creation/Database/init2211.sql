CREATE TABLE IF NOT EXISTS newsletter_signup (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    token VARCHAR(32) NOT NULL,
    verified BIT DEFAULT 0,
    reg_date TIMESTAMP
);

INSERT INTO newsletter_signup (email, token) VALUES ('example1@email.com', 'token1');
INSERT INTO newsletter_signup (email, token) VALUES ('example2@email.com', 'token2');
INSERT INTO newsletter_signup (email, token) VALUES ('example3@email.com', 'token3');
INSERT INTO newsletter_signup (email, token) VALUES ('example4@email.com', 'token4');
INSERT INTO newsletter_signup (email, token) VALUES ('example5@email.com', 'token5');
INSERT INTO newsletter_signup (email, token) VALUES ('example6@email.com', 'token6');
INSERT INTO newsletter_signup (email, token) VALUES ('example7@email.com', 'token7');
INSERT INTO newsletter_signup (email, token) VALUES ('example8@email.com', 'token8');
INSERT INTO newsletter_signup (email, token) VALUES ('example9@email.com', 'token9');
INSERT INTO newsletter_signup (email, token) VALUES ('example10@email.com', 'token10');
