CREATE TABLE IF NOT EXISTS users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30) NOT NULL,
  role VARCHAR(20) NOT NULL DEFAULT 'User',
  reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS roles (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  role_name VARCHAR(30) NOT NULL
);

INSERT INTO roles (role_name) VALUES 
('User'),
('Moderator'),
('User'),
('User'),
('Moderator'),
('User'),
('User'),
('Moderator'),
('User'),
('Moderator');
