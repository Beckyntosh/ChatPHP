CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    verification_code VARCHAR(255) NOT NULL,
    is_verified BOOLEAN NOT NULL DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (email, verification_code) VALUES 
('user1@example.com', 'verificationcode1'),
('user2@example.com', 'verificationcode2'),
('user3@example.com', 'verificationcode3'),
('user4@example.com', 'verificationcode4'),
('user5@example.com', 'verificationcode5'),
('user6@example.com', 'verificationcode6'),
('user7@example.com', 'verificationcode7'),
('user8@example.com', 'verificationcode8'),
('user9@example.com', 'verificationcode9'),
('user10@example.com', 'verificationcode10');