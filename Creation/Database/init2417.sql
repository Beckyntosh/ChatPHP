CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
trial_start DATE,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert values into the table
INSERT INTO users (username, email, trial_start) VALUES ('JohnDoe', 'johndoe@example.com', '2022-01-01');
INSERT INTO users (username, email, trial_start) VALUES ('JaneSmith', 'janesmith@example.com', '2022-01-02');
INSERT INTO users (username, email, trial_start) VALUES ('AliceJones', 'alicejones@example.com', '2022-01-03');
INSERT INTO users (username, email, trial_start) VALUES ('BobBrown', 'bobbrown@example.com', '2022-01-04');
INSERT INTO users (username, email, trial_start) VALUES ('EveTaylor', 'evetaylor@example.com', '2022-01-05');
INSERT INTO users (username, email, trial_start) VALUES ('MichaelClark', 'michaelclark@example.com', '2022-01-06');
INSERT INTO users (username, email, trial_start) VALUES ('SarahLee', 'sarahlee@example.com', '2022-01-07');
INSERT INTO users (username, email, trial_start) VALUES ('DavidWhite', 'davidwhite@example.com', '2022-01-08');
INSERT INTO users (username, email, trial_start) VALUES ('EmmaAdams', 'emmaadams@example.com', '2022-01-09');
INSERT INTO users (username, email, trial_start) VALUES ('RyanMiller', 'ryanmiller@example.com', '2022-01-10');