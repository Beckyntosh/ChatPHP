-- init.sql
CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    role VARCHAR(30) NOT NULL DEFAULT 'User',
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO users (username, role) VALUES
('Alice', 'User'),
('Bob', 'User'),
('Charlie', 'User'),
('Diana', 'User'),
('Evan', 'User'),
('Fiona', 'User'),
('George', 'User'),
('Hannah', 'User'),
('Ian', 'User'),
('Jenny', 'User');
