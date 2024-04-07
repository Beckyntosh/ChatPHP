CREATE TABLE IF NOT EXISTS subscriptions (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  trial_ends DATE NOT NULL,
  reg_date TIMESTAMP
);

INSERT INTO subscriptions (name, email, trial_ends) VALUES ('John Doe', 'johndoe@example.com', '2022-10-31');
INSERT INTO subscriptions (name, email, trial_ends) VALUES ('Alice Smith', 'alice.smith@example.com', '2022-09-30');
INSERT INTO subscriptions (name, email, trial_ends) VALUES ('Bob Johnson', 'bjohnson@example.com', '2022-11-15');
INSERT INTO subscriptions (name, email, trial_ends) VALUES ('Jane Brown', 'jane.brown@example.com', '2022-08-25');
INSERT INTO subscriptions (name, email, trial_ends) VALUES ('Sarah Lee', 'sarahlee@example.com', '2022-12-05');
INSERT INTO subscriptions (name, email, trial_ends) VALUES ('Michael Davis', 'michaeld@example.com', '2022-10-20');
INSERT INTO subscriptions (name, email, trial_ends) VALUES ('Emily Wilson', 'emilywilson@example.com', '2022-09-15');
INSERT INTO subscriptions (name, email, trial_ends) VALUES ('Alex Clark', 'alexclark@example.com', '2022-11-30');
INSERT INTO subscriptions (name, email, trial_ends) VALUES ('Mary Roberts', 'maryr@example.com', '2022-08-10');
INSERT INTO subscriptions (name, email, trial_ends) VALUES ('Chris Adams', 'cadams@example.com', '2022-12-20');