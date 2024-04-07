CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    signup_date DATE,
    trial_end_date DATE,
    reg_date TIMESTAMP
);

INSERT INTO users (username, email, signup_date, trial_end_date) VALUES ('john_doe', 'john.doe@example.com', '2022-09-15', '2022-10-15');
INSERT INTO users (username, email, signup_date, trial_end_date) VALUES ('jane_smith', 'jane.smith@example.com', '2022-09-16', '2022-10-16');
INSERT INTO users (username, email, signup_date, trial_end_date) VALUES ('sam_jackson', 'sam.jackson@example.com', '2022-09-17', '2022-10-17');
INSERT INTO users (username, email, signup_date, trial_end_date) VALUES ('lisa_davis', 'lisa.davis@example.com', '2022-09-18', '2022-10-18');
INSERT INTO users (username, email, signup_date, trial_end_date) VALUES ('mike_roberts', 'mike.roberts@example.com', '2022-09-19', '2022-10-19');
INSERT INTO users (username, email, signup_date, trial_end_date) VALUES ('sara_brown', 'sara.brown@example.com', '2022-09-20', '2022-10-20');
INSERT INTO users (username, email, signup_date, trial_end_date) VALUES ('adam_wilson', 'adam.wilson@example.com', '2022-09-21', '2022-10-21');
INSERT INTO users (username, email, signup_date, trial_end_date) VALUES ('emily_miller', 'emily.miller@example.com', '2022-09-22', '2022-10-22');
INSERT INTO users (username, email, signup_date, trial_end_date) VALUES ('chris_lee', 'chris.lee@example.com', '2022-09-23', '2022-10-23');
INSERT INTO users (username, email, signup_date, trial_end_date) VALUES ('julia_clark', 'julia.clark@example.com', '2022-09-24', '2022-10-24');
