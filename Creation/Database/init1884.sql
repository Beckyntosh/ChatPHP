-- init.sql

CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50) NOT NULL,
trial_start DATE NOT NULL,
trial_end DATE NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO users (email, trial_start, trial_end) VALUES ('user1@example.com', '2022-10-01', '2022-11-01');
INSERT INTO users (email, trial_start, trial_end) VALUES ('user2@example.com', '2022-10-02', '2022-11-02');
INSERT INTO users (email, trial_start, trial_end) VALUES ('user3@example.com', '2022-10-03', '2022-11-03');
INSERT INTO users (email, trial_start, trial_end) VALUES ('user4@example.com', '2022-10-04', '2022-11-04');
INSERT INTO users (email, trial_start, trial_end) VALUES ('user5@example.com', '2022-10-05', '2022-11-05');
INSERT INTO users (email, trial_start, trial_end) VALUES ('user6@example.com', '2022-10-06', '2022-11-06');
INSERT INTO users (email, trial_start, trial_end) VALUES ('user7@example.com', '2022-10-07', '2022-11-07');
INSERT INTO users (email, trial_start, trial_end) VALUES ('user8@example.com', '2022-10-08', '2022-11-08');
INSERT INTO users (email, trial_start, trial_end) VALUES ('user9@example.com', '2022-10-09', '2022-11-09');
INSERT INTO users (email, trial_start, trial_end) VALUES ('user10@example.com', '2022-10-10', '2022-11-10');
