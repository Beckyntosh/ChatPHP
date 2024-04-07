CREATE TABLE IF NOT EXISTS users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    preferences TEXT,
    reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS news_categories (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(50) NOT NULL UNIQUE
);

INSERT INTO news_categories (category_name) VALUES 
('Politics'),
('Technology'),
('Entertainment'),
('Sports'),
('Science');

INSERT INTO users (username, password, preferences) VALUES 
('JohnDoe', 'password1', '["Politics","Technology","Sports"]'),
('JaneSmith', 'password2', '["Entertainment","Sports","Science"]'),
('Alice123', 'password3', '["Politics","Entertainment","Science"]'),
('BobTheBuilder', 'password4', '["Technology","Sports","Science"]'),
('EvaGreen', 'password5', '["Politics","Sports","Science"]'),
('SamWilliams', 'password6', '["Technology","Entertainment","Sports"]'),
('LilyPond', 'password7', '["Politics","Technology","Entertainment"]'),
('MaxPower', 'password8', '["Entertainment","Sports","Science"]'),
('GraceJones', 'password9', '["Politics","Technology","Science"]'),
('TomFord', 'password10', '["Politics","Technology","Entertainment"]');