CREATE TABLE IF NOT EXISTS user_dashboard (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED NOT NULL,
widget_layout VARCHAR(255) NOT NULL,
reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
first_login BOOLEAN DEFAULT TRUE,
reg_date TIMESTAMP
);

INSERT INTO users (username, password, first_login, reg_date) VALUES 
('john_doe', 'password1', TRUE, NOW()),
('jane_smith', 'password2', TRUE, NOW()),
('bob_jackson', 'password3', TRUE, NOW()),
('alice_johnson', 'password4', TRUE, NOW()),
('sam_wilson', 'password5', TRUE, NOW()),
('emily_thomas', 'password6', TRUE, NOW()),
('mike_adams', 'password7', TRUE, NOW()),
('sophia_clark', 'password8', TRUE, NOW()),
('ryan_baker', 'password9', TRUE, NOW()),
('laura_anderson', 'password10', TRUE, NOW());
