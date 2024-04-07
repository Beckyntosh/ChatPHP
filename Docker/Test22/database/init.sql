CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    language_preference VARCHAR(2) NOT NULL
);

INSERT INTO users (name, email, language_preference) VALUES 
('John Doe', 'john.doe@example.com', 'en'),
('Jane Smith', 'jane.smith@example.com', 'fr'),
('Michael Johnson', 'michael.johnson@example.com', 'es'),
('Emily Brown', 'emily.brown@example.com', 'en'),
('David Wilson', 'david.wilson@example.com', 'fr'),
('Jennifer Lee', 'jennifer.lee@example.com', 'es'),
('Daniel Martinez', 'daniel.martinez@example.com', 'en'),
('Sarah Taylor', 'sarah.taylor@example.com', 'fr'),
('Kevin Garcia', 'kevin.garcia@example.com', 'es'),
('Jessica Rodriguez', 'jessica.rodriguez@example.com', 'en');
