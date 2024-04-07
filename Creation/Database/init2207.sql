CREATE TABLE IF NOT EXISTS NewsletterSubscribers (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50) NOT NULL,
token VARCHAR(32) NOT NULL,
confirmed TINYINT(1) NOT NULL DEFAULT '0',
reg_date TIMESTAMP
);

INSERT INTO NewsletterSubscribers (email, token) VALUES ('user1@example.com', MD5(RAND()));
INSERT INTO NewsletterSubscribers (email, token) VALUES ('user2@example.com', MD5(RAND()));
INSERT INTO NewsletterSubscribers (email, token) VALUES ('user3@example.com', MD5(RAND()));
INSERT INTO NewsletterSubscribers (email, token) VALUES ('user4@example.com', MD5(RAND()));
INSERT INTO NewsletterSubscribers (email, token) VALUES ('user5@example.com', MD5(RAND()));
INSERT INTO NewsletterSubscribers (email, token) VALUES ('user6@example.com', MD5(RAND()));
INSERT INTO NewsletterSubscribers (email, token) VALUES ('user7@example.com', MD5(RAND()));
INSERT INTO NewsletterSubscribers (email, token) VALUES ('user8@example.com', MD5(RAND()));
INSERT INTO NewsletterSubscribers (email, token) VALUES ('user9@example.com', MD5(RAND()));
INSERT INTO NewsletterSubscribers (email, token) VALUES ('user10@example.com', MD5(RAND()));