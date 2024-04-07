CREATE TABLE IF NOT EXISTS email_preferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    promotion_emails BOOLEAN DEFAULT FALSE,
    news_emails BOOLEAN DEFAULT FALSE,
    update_emails BOOLEAN DEFAULT FALSE,
    reg_date TIMESTAMP
);

INSERT INTO email_preferences (email, promotion_emails, news_emails, update_emails) VALUES ('example1@example.com', 1, 0, 1);
INSERT INTO email_preferences (email, promotion_emails, news_emails, update_emails) VALUES ('example2@example.com', 0, 1, 1);
INSERT INTO email_preferences (email, promotion_emails, news_emails, update_emails) VALUES ('example3@example.com', 1, 1, 0);
INSERT INTO email_preferences (email, promotion_emails, news_emails, update_emails) VALUES ('example4@example.com', 0, 0, 1);
INSERT INTO email_preferences (email, promotion_emails, news_emails, update_emails) VALUES ('example5@example.com', 1, 1, 1);
INSERT INTO email_preferences (email, promotion_emails, news_emails, update_emails) VALUES ('example6@example.com', 0, 1, 0);
INSERT INTO email_preferences (email, promotion_emails, news_emails, update_emails) VALUES ('example7@example.com', 1, 0, 0);
INSERT INTO email_preferences (email, promotion_emails, news_emails, update_emails) VALUES ('example8@example.com', 1, 1, 1);
INSERT INTO email_preferences (email, promotion_emails, news_emails, update_emails) VALUES ('example9@example.com', 0, 0, 0);
INSERT INTO email_preferences (email, promotion_emails, news_emails, update_emails) VALUES ('example10@example.com', 1, 0, 1);