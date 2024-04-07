CREATE TABLE IF NOT EXISTS users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(50),
  role VARCHAR(10),
  reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS roles (
  role VARCHAR(10) PRIMARY KEY
);

INSERT INTO roles (role) VALUES 
('User'), 
('Admin'), 
('Moderator'),
('User1'),
('User2'),
('User3'),
('User4'),
('User5'),
('User6'),
('User7'),
('User8'),
('User9'),
('User10');
