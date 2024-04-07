CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    trial_start DATE NOT NULL,
    trial_end DATE NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO users (name, email, trial_start, trial_end) VALUES ('John Doe', 'john.doe@example.com', '2022-01-01', '2022-02-01');
INSERT INTO users (name, email, trial_start, trial_end) VALUES ('Jane Smith', 'jane.smith@example.com', '2022-01-15', '2022-02-15');
INSERT INTO users (name, email, trial_start, trial_end) VALUES ('Alice Johnson', 'alice.johnson@example.com', '2022-02-01', '2022-03-01');
INSERT INTO users (name, email, trial_start, trial_end) VALUES ('Bob Brown', 'bob.brown@example.com', '2022-02-15', '2022-03-15');
INSERT INTO users (name, email, trial_start, trial_end) VALUES ('Emily Davis', 'emily.davis@example.com', '2022-03-01', '2022-04-01');
INSERT INTO users (name, email, trial_start, trial_end) VALUES ('Michael Wilson', 'michael.wilson@example.com', '2022-03-15', '2022-04-15');
INSERT INTO users (name, email, trial_start, trial_end) VALUES ('Sarah Martinez', 'sarah.martinez@example.com', '2022-04-01', '2022-05-01');
INSERT INTO users (name, email, trial_start, trial_end) VALUES ('David Rodriguez', 'david.rodriguez@example.com', '2022-04-15', '2022-05-15');
INSERT INTO users (name, email, trial_start, trial_end) VALUES ('Olivia Lopez', 'olivia.lopez@example.com', '2022-05-01', '2022-06-01');
INSERT INTO users (name, email, trial_start, trial_end) VALUES ('Daniel Lee', 'daniel.lee@example.com', '2022-05-15', '2022-06-15');
