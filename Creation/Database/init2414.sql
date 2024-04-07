CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    trial_start_date DATE NOT NULL,
    trial_end_date DATE NOT NULL,
    subscribed TINYINT(1) NOT NULL DEFAULT '0',
    reg_date TIMESTAMP
);

INSERT INTO users (email, trial_start_date, trial_end_date, subscribed, reg_date) VALUES ('user1@example.com', '2022-10-01', '2022-10-31', 0, now());
INSERT INTO users (email, trial_start_date, trial_end_date, subscribed, reg_date) VALUES ('user2@example.com', '2022-10-05', '2022-11-04', 0, now());
INSERT INTO users (email, trial_start_date, trial_end_date, subscribed, reg_date) VALUES ('user3@example.com', '2022-10-10', '2022-11-09', 0, now());
INSERT INTO users (email, trial_start_date, trial_end_date, subscribed, reg_date) VALUES ('user4@example.com', '2022-10-15', '2022-11-14', 0, now());
INSERT INTO users (email, trial_start_date, trial_end_date, subscribed, reg_date) VALUES ('user5@example.com', '2022-10-20', '2022-11-19', 0, now());
INSERT INTO users (email, trial_start_date, trial_end_date, subscribed, reg_date) VALUES ('user6@example.com', '2022-10-25', '2022-11-24', 0, now());
INSERT INTO users (email, trial_start_date, trial_end_date, subscribed, reg_date) VALUES ('user7@example.com', '2022-10-30', '2022-11-29', 0, now());
INSERT INTO users (email, trial_start_date, trial_end_date, subscribed, reg_date) VALUES ('user8@example.com', '2022-11-01', '2022-12-01', 0, now());
INSERT INTO users (email, trial_start_date, trial_end_date, subscribed, reg_date) VALUES ('user9@example.com', '2022-11-05', '2022-12-05', 0, now());
INSERT INTO users (email, trial_start_date, trial_end_date, subscribed, reg_date) VALUES ('user10@example.com', '2022-11-10', '2022-12-10', 0, now());