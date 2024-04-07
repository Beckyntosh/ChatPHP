CREATE TABLE users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fullname VARCHAR(30) NOT NULL,
email VARCHAR(50),
trial_start DATE,
trial_end DATE,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO users (fullname, email, trial_start, trial_end) VALUES ('John Doe', 'johndoe@example.com', '2023-05-15', '2023-06-14');
INSERT INTO users (fullname, email, trial_start, trial_end) VALUES ('Alice Smith', 'alice.smith@example.com', '2023-05-16', '2023-06-15');
INSERT INTO users (fullname, email, trial_start, trial_end) VALUES ('Bob Johnson', 'bob.johnson@example.com', '2023-05-17', '2023-06-16');
INSERT INTO users (fullname, email, trial_start, trial_end) VALUES ('Emily Brown', 'emily.brown@example.com', '2023-05-18', '2023-06-17');
INSERT INTO users (fullname, email, trial_start, trial_end) VALUES ('James Wilson', 'james.wilson@example.com', '2023-05-19', '2023-06-18');
INSERT INTO users (fullname, email, trial_start, trial_end) VALUES ('Sarah Davis', 'sarah.davis@example.com', '2023-05-20', '2023-06-19');
INSERT INTO users (fullname, email, trial_start, trial_end) VALUES ('Michael Miller', 'michael.miller@example.com', '2023-05-21', '2023-06-20');
INSERT INTO users (fullname, email, trial_start, trial_end) VALUES ('Emma Wilson', 'emma.wilson@example.com', '2023-05-22', '2023-06-21');
INSERT INTO users (fullname, email, trial_start, trial_end) VALUES ('Christopher Lee', 'christopher.lee@example.com', '2023-05-23', '2023-06-22');
INSERT INTO users (fullname, email, trial_start, trial_end) VALUES ('Olivia Taylor', 'olivia.taylor@example.com', '2023-05-24', '2023-06-23');
