CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    trial_start_date DATE,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO users (username, email, trial_start_date) VALUES ('JohnDoe', 'johndoe@example.com', '2022-01-01');
INSERT INTO users (username, email, trial_start_date) VALUES ('JaneSmith', 'janesmith@example.com', '2022-01-02');
INSERT INTO users (username, email, trial_start_date) VALUES ('AliceJones', 'alicejones@example.com', '2022-01-03');
INSERT INTO users (username, email, trial_start_date) VALUES ('BobBrown', 'bobbrown@example.com', '2022-01-04');
INSERT INTO users (username, email, trial_start_date) VALUES ('SarahWilson', 'sarahwilson@example.com', '2022-01-05');
INSERT INTO users (username, email, trial_start_date) VALUES ('MikeDavis', 'mikedavis@example.com', '2022-01-06');
INSERT INTO users (username, email, trial_start_date) VALUES ('EmilyGarcia', 'emilygarcia@example.com', '2022-01-07');
INSERT INTO users (username, email, trial_start_date) VALUES ('ChrisMartinez', 'chrismartinez@example.com', '2022-01-08');
INSERT INTO users (username, email, trial_start_date) VALUES ('LauraRodriguez', 'laurarodriguez@example.com', '2022-01-09');
INSERT INTO users (username, email, trial_start_date) VALUES ('KevinWalker', 'kevinwalker@example.com', '2022-01-10');
