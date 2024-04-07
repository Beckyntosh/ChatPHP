CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50) NOT NULL,
trial_start_date DATE NOT NULL,
UNIQUE (email)
);

INSERT INTO users (email, trial_start_date) VALUES ('test1@example.com', '2022-01-01');
INSERT INTO users (email, trial_start_date) VALUES ('test2@example.com', '2022-02-05');
INSERT INTO users (email, trial_start_date) VALUES ('test3@example.com', '2022-03-12');
INSERT INTO users (email, trial_start_date) VALUES ('test4@example.com', '2022-04-18');
INSERT INTO users (email, trial_start_date) VALUES ('test5@example.com', '2022-05-24');
INSERT INTO users (email, trial_start_date) VALUES ('test6@example.com', '2022-06-30');
INSERT INTO users (email, trial_start_date) VALUES ('test7@example.com', '2022-07-07');
INSERT INTO users (email, trial_start_date) VALUES ('test8@example.com', '2022-08-11');
INSERT INTO users (email, trial_start_date) VALUES ('test9@example.com', '2022-09-16');
INSERT INTO users (email, trial_start_date) VALUES ('test10@example.com', '2022-10-22');
