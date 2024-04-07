CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
signup_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
trial_end_date DATETIME NULL,
status ENUM('active', 'trial', 'expired') DEFAULT 'trial'
);

INSERT INTO users (username, email, trial_end_date) VALUES ('Alice', 'alice@example.com', '2022-12-31 00:00:00');
INSERT INTO users (username, email, trial_end_date) VALUES ('Bob', 'bob@example.com', '2022-11-30 12:00:00');
INSERT INTO users (username, email, trial_end_date) VALUES ('Charlie', 'charlie@example.com', '2022-10-31 18:30:00');
INSERT INTO users (username, email, trial_end_date) VALUES ('David', 'david@example.com', '2022-09-30 06:45:00');
INSERT INTO users (username, email, trial_end_date) VALUES ('Eve', 'eve@example.com', '2022-08-31 15:20:00');
INSERT INTO users (username, email, trial_end_date) VALUES ('Frank', 'frank@example.com', '2022-07-31 09:10:00');
INSERT INTO users (username, email, trial_end_date) VALUES ('Grace', 'grace@example.com', '2022-06-30 03:55:00');
INSERT INTO users (username, email, trial_end_date) VALUES ('Harry', 'harry@example.com', '2022-05-31 21:25:00');
INSERT INTO users (username, email, trial_end_date) VALUES ('Ivy', 'ivy@example.com', '2022-04-30 14:35:00');
INSERT INTO users (username, email, trial_end_date) VALUES ('Jack', 'jack@example.com', '2022-03-31 08:05:00');