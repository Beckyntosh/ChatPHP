CREATE TABLE IF NOT EXISTS users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  trial_start_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  trial_end_date DATETIME,
  reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS subscriptions (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id INT(6) UNSIGNED,
  status VARCHAR(30) NOT NULL DEFAULT 'trial',
  start_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  end_date DATETIME,
  FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (username, email, trial_end_date) VALUES ('JohnDoe', 'johndoe@example.com', '2023-01-15 00:00:00'),
('JaneSmith', 'janesmith@example.com', '2023-02-20 00:00:00'),
('AliceBrown', 'alicebrown@example.com', '2023-03-12 00:00:00'),
('BobWhite', 'bobwhite@example.com', '2023-04-05 00:00:00'),
('EmilyDavis', 'emilydavis@example.com', '2023-05-18 00:00:00'),
('MichaelClark', 'michaelclark@example.com', '2023-06-30 00:00:00'),
('SarahLee', 'sarahlee@example.com', '2023-07-22 00:00:00'),
('DavidEvans', 'davidevans@example.com', '2023-08-09 00:00:00'),
('OliviaKing', 'oliviaking@example.com', '2023-09-25 00:00:00'),
('WilliamAdams', 'williamadams@example.com', '2023-10-14 00:00:00');
