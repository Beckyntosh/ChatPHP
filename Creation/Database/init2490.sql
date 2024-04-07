CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
);

INSERT INTO users (username, password, email) VALUES
('john_doe', 'password123', 'john.doe@example.com'),
('jane_smith', 'ilovecoding', 'jane.smith@example.com'),
('alex_walker', 'securepass', 'alex.walker@example.com'),
('emily_carter', 'mydogiscool', 'emily.carter@example.com'),
('mike_jackson', 'letmeinplease', 'mike.jackson@example.com'),
('sarah_fisher', 'password456', 'sarah.fisher@example.com'),
('chris_roberts', 'p@ssw0rd!', 'chris.roberts@example.com'),
('laura_miller', 'lauraslaura', 'laura.miller@example.com'),
('kevin_brown', 'kevin1234', 'kevin.brown@example.com'),
('tina_garcia', 'tinaiscool', 'tina.garcia@example.com');
