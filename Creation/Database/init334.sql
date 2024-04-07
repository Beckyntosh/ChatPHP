CREATE TABLE IF NOT EXISTS users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  password VARCHAR(255) NOT NULL,
  reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS recovery_codes (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id INT(6) UNSIGNED NOT NULL,
  code VARCHAR(255) NOT NULL,
  used TINYINT(1) NOT NULL DEFAULT '0',
  FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (username, email, password, reg_date) VALUES 
('john_doe', 'john.doe@gmail.com', 'johns_password', NOW()),
('jane_smith', 'jane.smith@yahoo.com', 'janes_password', NOW()),
('alex_brown', 'alex.brown@hotmail.com', 'alexs_password', NOW()),
('emily_white', 'emily.white@outlook.com', 'emilys_password', NOW()),
('michael_jones', 'michael.jones@live.com', 'michaels_password', NOW()),
('sophia_davis', 'sophia.davis@aol.com', 'sophias_password', NOW()),
('william_clark', 'william.clark@icloud.com', 'williams_password', NOW()),
('natalie_wright', 'natalie.wright@protonmail.com', 'natalies_password', NOW()),
('adam_miller', 'adam.miller@rocketmail.com', 'adams_password', NOW()),
('olivia_martinez', 'olivia.martinez@yandex.com', 'olivias_password', NOW());

INSERT INTO recovery_codes (user_id, code, used) VALUES 
(1, '123456', 0),
(2, '234567', 0),
(3, '345678', 0),
(4, '456789', 0),
(5, '567890', 0),
(6, '678901', 0),
(7, '789012', 0),
(8, '890123', 0),
(9, '901234', 0),
(10, '012345', 0);
