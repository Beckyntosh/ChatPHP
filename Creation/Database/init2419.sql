CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    trial_start DATE,
    trial_end DATE,
    reg_date TIMESTAMP
);

INSERT INTO users (fullname, email, password, trial_start, trial_end) VALUES ('John Doe', 'john.doe@example.com', 'password123', '2022-01-01', '2022-02-01');
INSERT INTO users (fullname, email, password, trial_start, trial_end) VALUES ('Jane Smith', 'jane.smith@example.com', 'qwerty456', '2022-01-05', '2022-02-05');
INSERT INTO users (fullname, email, password, trial_start, trial_end) VALUES ('Alice Johnson', 'alice.j@example.com', 'pass1234', '2022-01-10', '2022-02-10');
INSERT INTO users (fullname, email, password, trial_start, trial_end) VALUES ('Bob Brown', 'bob.brown@example.com', 'hello123', '2022-01-15', '2022-02-15');
INSERT INTO users (fullname, email, password, trial_start, trial_end) VALUES ('Emma White', 'emma.white@example.com', 'test456', '2022-01-20', '2022-02-20');
INSERT INTO users (fullname, email, password, trial_start, trial_end) VALUES ('Michael Davis', 'michael.d@example.com', 'secure789', '2022-01-25', '2022-02-25');
INSERT INTO users (fullname, email, password, trial_start, trial_end) VALUES ('Sara Wilson', 'sara.wilson@example.com', 'passpass', '2022-01-30', '2022-02-30');
INSERT INTO users (fullname, email, password, trial_start, trial_end) VALUES ('Alex Miller', 'alex.m@example.com', '123456789', '2022-02-02', '2022-03-02');
INSERT INTO users (fullname, email, password, trial_start, trial_end) VALUES ('Olivia Lee', 'olivia.l@example.com', 'p@ssw0rd', '2022-02-07', '2022-03-07');
INSERT INTO users (fullname, email, password, trial_start, trial_end) VALUES ('Ryan Clark', 'ryan.c@example.com', 'password2022', '2022-02-12', '2022-03-12');
