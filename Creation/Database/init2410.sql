CREATE TABLE IF NOT EXISTS subscribers (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50) NOT NULL,
start_date TIMESTAMP,
trial_end_date DATE NOT NULL,
active_subscription BOOLEAN DEFAULT FALSE,
UNIQUE (email)
);

INSERT INTO subscribers (email, start_date, trial_end_date) VALUES ('john@example.com', '2022-01-01 12:00:00', '2022-02-01');
INSERT INTO subscribers (email, start_date, trial_end_date) VALUES ('mary@example.com', '2022-01-05 08:30:00', '2022-02-05');
INSERT INTO subscribers (email, start_date, trial_end_date) VALUES ('alex@example.com', '2022-01-10 15:45:00', '2022-02-10');
INSERT INTO subscribers (email, start_date, trial_end_date) VALUES ('sara@example.com', '2022-01-15 10:20:00', '2022-02-15');
INSERT INTO subscribers (email, start_date, trial_end_date) VALUES ('mike@example.com', '2022-01-20 14:10:00', '2022-02-20');
INSERT INTO subscribers (email, start_date, trial_end_date) VALUES ('laura@example.com', '2022-01-25 09:00:00', '2022-02-25');
INSERT INTO subscribers (email, start_date, trial_end_date) VALUES ('chris@example.com', '2022-01-30 11:30:00', '2022-02-30');
INSERT INTO subscribers (email, start_date, trial_end_date) VALUES ('emily@example.com', '2022-02-03 13:50:00', '2022-03-03');
INSERT INTO subscribers (email, start_date, trial_end_date) VALUES ('peter@example.com', '2022-02-08 07:40:00', '2022-03-08');
INSERT INTO subscribers (email, start_date, trial_end_date) VALUES ('julia@example.com', '2022-02-12 18:15:00', '2022-03-12');
