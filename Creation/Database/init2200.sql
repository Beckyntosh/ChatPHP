CREATE TABLE IF NOT EXISTS newsletter_signups (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    token VARCHAR(50) NOT NULL,
    confirmed TINYINT(1) DEFAULT 0,
    reg_date TIMESTAMP
);

INSERT INTO newsletter_signups (email, token, confirmed, reg_date) VALUES ('user1@example.com', 'token1', 1, CURRENT_TIMESTAMP);
INSERT INTO newsletter_signups (email, token, confirmed, reg_date) VALUES ('user2@example.com', 'token2', 0, CURRENT_TIMESTAMP);
INSERT INTO newsletter_signups (email, token, confirmed, reg_date) VALUES ('user3@example.com', 'token3', 1, CURRENT_TIMESTAMP);
INSERT INTO newsletter_signups (email, token, confirmed, reg_date) VALUES ('user4@example.com', 'token4', 0, CURRENT_TIMESTAMP);
INSERT INTO newsletter_signups (email, token, confirmed, reg_date) VALUES ('user5@example.com', 'token5', 1, CURRENT_TIMESTAMP);
INSERT INTO newsletter_signups (email, token, confirmed, reg_date) VALUES ('user6@example.com', 'token6', 0, CURRENT_TIMESTAMP);
INSERT INTO newsletter_signups (email, token, confirmed, reg_date) VALUES ('user7@example.com', 'token7', 1, CURRENT_TIMESTAMP);
INSERT INTO newsletter_signups (email, token, confirmed, reg_date) VALUES ('user8@example.com', 'token8', 0, CURRENT_TIMESTAMP);
INSERT INTO newsletter_signups (email, token, confirmed, reg_date) VALUES ('user9@example.com', 'token9', 1, CURRENT_TIMESTAMP);
INSERT INTO newsletter_signups (email, token, confirmed, reg_date) VALUES ('user10@example.com', 'token10', 0, CURRENT_TIMESTAMP);