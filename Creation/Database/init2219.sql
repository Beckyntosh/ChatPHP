CREATE TABLE IF NOT EXISTS newsletter_signup (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50) NOT NULL,
token VARCHAR(50) NOT NULL,
confirmed BOOLEAN DEFAULT FALSE,
reg_date TIMESTAMP
);

INSERT INTO newsletter_signup (email, token) VALUES ("test1@example.com", "token1");
INSERT INTO newsletter_signup (email, token) VALUES ("test2@example.com", "token2");
INSERT INTO newsletter_signup (email, token) VALUES ("test3@example.com", "token3");
INSERT INTO newsletter_signup (email, token) VALUES ("test4@example.com", "token4");
INSERT INTO newsletter_signup (email, token) VALUES ("test5@example.com", "token5");
INSERT INTO newsletter_signup (email, token) VALUES ("test6@example.com", "token6");
INSERT INTO newsletter_signup (email, token) VALUES ("test7@example.com", "token7");
INSERT INTO newsletter_signup (email, token) VALUES ("test8@example.com", "token8");
INSERT INTO newsletter_signup (email, token) VALUES ("test9@example.com", "token9");
INSERT INTO newsletter_signup (email, token) VALUES ("test10@example.com", "token10");