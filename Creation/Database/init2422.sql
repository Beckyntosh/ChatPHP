CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    full_name VARCHAR(50) NOT NULL,
    trial_start DATE NOT NULL,
    trial_end DATE NOT NULL,
    UNIQUE (email)
);

INSERT INTO users (email, full_name, trial_start, trial_end) VALUES ('john@example.com', 'John Doe', '2022-04-01', '2022-05-01');
INSERT INTO users (email, full_name, trial_start, trial_end) VALUES ('jane@example.com', 'Jane Smith', '2022-04-02', '2022-05-02');
INSERT INTO users (email, full_name, trial_start, trial_end) VALUES ('alex@example.com', 'Alex Johnson', '2022-04-03', '2022-05-03');
INSERT INTO users (email, full_name, trial_start, trial_end) VALUES ('sara@example.com', 'Sara Brown', '2022-04-04', '2022-05-04');
INSERT INTO users (email, full_name, trial_start, trial_end) VALUES ('matt@example.com', 'Matt Williams', '2022-04-05', '2022-05-05');
INSERT INTO users (email, full_name, trial_start, trial_end) VALUES ('emily@example.com', 'Emily Davis', '2022-04-06', '2022-05-06');
INSERT INTO users (email, full_name, trial_start, trial_end) VALUES ('chris@example.com', 'Chris Martinez', '2022-04-07', '2022-05-07');
INSERT INTO users (email, full_name, trial_start, trial_end) VALUES ('lisa@example.com', 'Lisa Garcia', '2022-04-08', '2022-05-08');
INSERT INTO users (email, full_name, trial_start, trial_end) VALUES ('ryan@example.com', 'Ryan Rodriguez', '2022-04-09', '2022-05-09');
INSERT INTO users (email, full_name, trial_start, trial_end) VALUES ('kate@example.com', 'Kate Hernandez', '2022-04-10', '2022-05-10');