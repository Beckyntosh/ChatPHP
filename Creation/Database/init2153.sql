CREATE TABLE IF NOT EXISTS user_preferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userid VARCHAR(30) NOT NULL,
    homepage_layout VARCHAR(50),
    theme VARCHAR(50),
    reg_date TIMESTAMP
);

INSERT INTO user_preferences (userid, homepage_layout, theme, reg_date) VALUES 
('user1', 'default', 'light', NOW()),
('user2', 'compact', 'dark', NOW()),
('user3', 'expanded', 'light', NOW()),
('user4', 'default', 'dark', NOW()),
('user5', 'compact', 'light', NOW()),
('user6', 'expanded', 'dark', NOW()),
('user7', 'default', 'light', NOW()),
('user8', 'compact', 'dark', NOW()),
('user9', 'expanded', 'light', NOW()),
('user10', 'default', 'dark', NOW());
