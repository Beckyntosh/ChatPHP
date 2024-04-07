CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    signup_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    trial_end_date DATE NOT NULL,
    subscription_status TINYINT(1) NOT NULL DEFAULT 0,
    UNIQUE KEY unique_email (email)
);

INSERT INTO users (firstname, email, trial_end_date) VALUES ('John', 'john@example.com', '2023-06-15');
INSERT INTO users (firstname, email, trial_end_date) VALUES ('Alice', 'alice@example.com', '2023-06-20');
INSERT INTO users (firstname, email, trial_end_date) VALUES ('Bob', 'bob@example.com', '2023-06-25');
INSERT INTO users (firstname, email, trial_end_date) VALUES ('Sarah', 'sarah@example.com', '2023-06-30');
INSERT INTO users (firstname, email, trial_end_date) VALUES ('Mike', 'mike@example.com', '2023-07-05');
INSERT INTO users (firstname, email, trial_end_date) VALUES ('Emily', 'emily@example.com', '2023-07-10');
INSERT INTO users (firstname, email, trial_end_date) VALUES ('Chris', 'chris@example.com', '2023-07-15');
INSERT INTO users (firstname, email, trial_end_date) VALUES ('Laura', 'laura@example.com', '2023-07-20');
INSERT INTO users (firstname, email, trial_end_date) VALUES ('Kevin', 'kevin@example.com', '2023-07-25');
INSERT INTO users (firstname, email, trial_end_date) VALUES ('Olivia', 'olivia@example.com', '2023-07-30');