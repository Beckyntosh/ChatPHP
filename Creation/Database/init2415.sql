CREATE TABLE IF NOT EXISTS subscribers (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    signup_date DATETIME NOT NULL,
    trial_end_date DATETIME NOT NULL,
    UNIQUE (email)
);

INSERT INTO subscribers (email, signup_date, trial_end_date) VALUES ('user1@example.com', NOW(), DATE_ADD(NOW(), INTERVAL 1 MONTH));
INSERT INTO subscribers (email, signup_date, trial_end_date) VALUES ('user2@example.com', NOW(), DATE_ADD(NOW(), INTERVAL 1 MONTH));
INSERT INTO subscribers (email, signup_date, trial_end_date) VALUES ('user3@example.com', NOW(), DATE_ADD(NOW(), INTERVAL 1 MONTH));
INSERT INTO subscribers (email, signup_date, trial_end_date) VALUES ('user4@example.com', NOW(), DATE_ADD(NOW(), INTERVAL 1 MONTH));
INSERT INTO subscribers (email, signup_date, trial_end_date) VALUES ('user5@example.com', NOW(), DATE_ADD(NOW(), INTERVAL 1 MONTH));
INSERT INTO subscribers (email, signup_date, trial_end_date) VALUES ('user6@example.com', NOW(), DATE_ADD(NOW(), INTERVAL 1 MONTH));
INSERT INTO subscribers (email, signup_date, trial_end_date) VALUES ('user7@example.com', NOW(), DATE_ADD(NOW(), INTERVAL 1 MONTH));
INSERT INTO subscribers (email, signup_date, trial_end_date) VALUES ('user8@example.com', NOW(), DATE_ADD(NOW(), INTERVAL 1 MONTH));
INSERT INTO subscribers (email, signup_date, trial_end_date) VALUES ('user9@example.com', NOW(), DATE_ADD(NOW(), INTERVAL 1 MONTH));
INSERT INTO subscribers (email, signup_date, trial_end_date) VALUES ('user10@example.com', NOW(), DATE_ADD(NOW(), INTERVAL 1 MONTH));
